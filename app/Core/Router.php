<?php
namespace App\Core;

/**
 * Router — maps URLs to Controller@method
 * Supports static routes and parameterized slug routes
 */
class Router
{
    private array $routes = [];

    public function get(string $pattern, string $handler): void
    {
        $this->routes[] = [
            'method'  => 'GET',
            'pattern' => $pattern,
            'handler' => $handler,
        ];
    }

    public function post(string $pattern, string $handler): void
    {
        $this->routes[] = [
            'method'  => 'POST',
            'pattern' => $pattern,
            'handler' => $handler,
        ];
    }

    public function dispatch(string $uri, string $method): void
    {
        // Strip query string and base path
        $uri = strtok($uri, '?');
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        if ($base && strpos($uri, $base) === 0) {
            $uri = substr($uri, strlen($base));
        }
        $uri = '/' . trim($uri, '/');

        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            $pattern = $route['pattern'];

            // Convert :param placeholders to named capture groups
            $regex = preg_replace('/\/:([a-zA-Z_]+)/', '/(?P<$1>[^/]+)', $pattern);
            $regex = '#^' . $regex . '$#';

            if (preg_match($regex, $uri, $matches)) {
                // Extract only named captures
                $params = array_filter(
                    $matches,
                    fn($k) => is_string($k),
                    ARRAY_FILTER_USE_KEY
                );

                [$controllerName, $methodName] = explode('@', $route['handler']);
                $controllerClass = 'App\\Controllers\\' . $controllerName;

                if (!class_exists($controllerClass)) {
                    $this->abort(500, "Controller {$controllerClass} not found");
                    return;
                }

                $controller = new $controllerClass();

                if (!method_exists($controller, $methodName)) {
                    $this->abort(500, "Method {$methodName} not found in {$controllerClass}");
                    return;
                }

                $controller->$methodName($params);
                return;
            }
        }

        // No route matched
        $this->abort(404);
    }

    private function abort(int $code, string $message = ''): void
    {
        http_response_code($code);
        $view = ROOT_PATH . "/views/errors/{$code}.php";
        if (file_exists($view)) {
            include $view;
        } else {
            echo "<h1>Error {$code}</h1><p>" . htmlspecialchars($message) . '</p>';
        }
    }
}
