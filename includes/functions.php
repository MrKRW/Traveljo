<?php
// ============================================================
// TRAVELJO CEYLON TOURS — Helper Functions
// ============================================================

/**
 * Sanitize output — escape HTML special chars
 */
function e(string $str): string
{
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Generate a URL slug from a string
 */
function slugify(string $text): string
{
    $text = mb_strtolower(trim($text));
    $text = preg_replace('/[^\w\s-]/', '', $text);
    $text = preg_replace('/[\s_-]+/', '-', $text);
    return trim($text, '-');
}

/**
 * Truncate text to a given word count
 */
function excerpt(string $text, int $words = 25): string
{
    $arr = explode(' ', strip_tags($text));
    if (count($arr) <= $words) return $text;
    return implode(' ', array_slice($arr, 0, $words)) . '…';
}

/**
 * Format price with currency symbol
 */
function formatPrice(float $amount, string $currency = 'USD'): string
{
    $symbols = ['USD' => '$', 'EUR' => '€', 'GBP' => '£', 'LKR' => 'Rs.'];
    $sym = $symbols[$currency] ?? $currency . ' ';
    return $sym . number_format($amount, 0);
}

/**
 * Render star rating HTML
 */
function starRating(int $rating, int $max = 5): string
{
    $html = '<span class="stars" aria-label="' . $rating . ' out of ' . $max . '">';
    for ($i = 1; $i <= $max; $i++) {
        $html .= $i <= $rating ? '★' : '☆';
    }
    $html .= '</span>';
    return $html;
}

/**
 * Generate or get CSRF token
 */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Hidden CSRF input field
 */
function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

/**
 * Verify CSRF token
 */
function verify_csrf(): bool
{
    $token = $_POST['csrf_token'] ?? '';
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

/**
 * Pagination helper — returns array of page info
 */
function paginate(int $total, int $perPage, int $currentPage): array
{
    $totalPages = max(1, (int) ceil($total / $perPage));
    return [
        'total'       => $total,
        'per_page'    => $perPage,
        'current'     => $currentPage,
        'total_pages' => $totalPages,
        'offset'      => ($currentPage - 1) * $perPage,
        'has_prev'    => $currentPage > 1,
        'has_next'    => $currentPage < $totalPages,
    ];
}

/**
 * Current page URL helper
 */
function current_url(): string
{
    return SITE_URL . ($_SERVER['REQUEST_URI'] ?? '/');
}

/**
 * Determine if a nav link is active
 */
function is_active(string $path): string
{
    $uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    if ($base) $uri = str_replace($base, '', $uri);
    $uri = '/' . trim($uri, '/');
    return ($uri === '/' . trim($path, '/') || ($path !== '/' && strpos($uri, $path) === 0)) ? 'active' : '';
}

/**
 * Image URL helper — returns default placeholder if image missing
 */
function img_url(string $path, string $type = 'tours'): string
{
    if (empty($path)) {
        return ASSETS_URL . '/images/placeholder-' . $type . '.jpg';
    }
    if (str_starts_with($path, 'http')) return $path;
    return UPLOADS_URL . '/' . ltrim($path, '/');
}

/**
 * Dump and die (dev helper)
 */
function dd(mixed ...$vars): never
{
    echo '<pre style="background:#1a1a2e;color:#c9a84c;padding:1rem;overflow:auto">';
    foreach ($vars as $v) var_dump($v);
    echo '</pre>';
    exit;
}
