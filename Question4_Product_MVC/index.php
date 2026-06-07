<?php
require_once 'app/core/Router.php';
require_once 'app/controllers/ProductController.php';

$router = new Router();

$router->get('/', [ProductController::class, 'index']);
$router->get('/create', [ProductController::class, 'create']);
$router->post('/store', [ProductController::class, 'store']);
$router->get('/show/{id}', [ProductController::class, 'show']);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
?>
