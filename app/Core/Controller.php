<?php
namespace App\Core;

/**
 * Base Controller — provides render() helper
 */
abstract class Controller
{
    /**
     * Render a view with layout
     *
     * @param string $view   Path relative to views/ (e.g. 'home/index')
     * @param array  $data   Variables to extract into the view
     * @param string $layout Layout file in views/layouts/ (default 'main')
     */
    protected function render(string $view, array $data = [], string $layout = 'main'): void
    {
        // Make all $data keys available as variables
        extract($data, EXTR_SKIP);

        $viewFile   = ROOT_PATH . "/views/{$view}.php";
        $headerFile = ROOT_PATH . "/views/layouts/header.php";
        $footerFile = ROOT_PATH . "/views/layouts/footer.php";

        if (!file_exists($viewFile)) {
            http_response_code(500);
            die("View not found: {$view}");
        }

        // Buffer the view content
        ob_start();
        include $viewFile;
        $content = ob_get_clean();

        // Now render header, content, footer
        include $headerFile;
        echo $content;
        include $footerFile;
    }

    /**
     * Render a view fragment (no layout)
     */
    protected function renderPartial(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        $viewFile = ROOT_PATH . "/views/{$view}.php";
        if (file_exists($viewFile)) {
            include $viewFile;
        }
    }

    /**
     * JSON response helper
     */
    protected function json(array $data, int $code = 200): void
    {
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    /**
     * Redirect helper
     */
    protected function redirect(string $url): void
    {
        header("Location: " . SITE_URL . $url);
        exit;
    }

    /**
     * Generate or validate CSRF token
     */
    protected function csrfToken(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    protected function verifyCsrf(): bool
    {
        $token = $_POST['csrf_token'] ?? '';
        return hash_equals($_SESSION['csrf_token'] ?? '', $token);
    }
}
