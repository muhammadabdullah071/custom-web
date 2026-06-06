<?php
require_once 'app/core/Router.php';
require_once 'app/controllers/ProductController.php';

$router = new Router();

$router->get('index.php', [ProductController::class, 'index']);
$router->get('index.php?action=index', [ProductController::class, 'index']);
$router->get('index.php?action=create', [ProductController::class, 'create']);
$router->post('index.php?action=store', [ProductController::class, 'store']);
$router->get('index.php?action=show&id={id}', [ProductController::class, 'show']);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Rebuild the URI with query string if present
if (!empty($_GET)) {
    $uri = 'index.php?' . http_build_query($_GET);
}

$router->dispatch($uri, $method);
?>
