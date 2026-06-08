<?php
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

if ($path === '/' || $path === '/index.php' || strpos($path, '/index.php/') === 0 || strpos($path, '/create') === 0 || strpos($path, '/store') === 0 || strpos($path, '/show/') === 0) {
    require __DIR__ . '/index.php';
    return true;
}

if (file_exists(__DIR__ . $path)) {
    return false;
}

http_response_code(404);
echo "404 Not Found";
