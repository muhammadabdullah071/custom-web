<?php
if (php_sapi_name() === 'cli-server') {
    $routerFile = __DIR__ . '/router.php';
    if (file_exists($routerFile)) {
        $result = require $routerFile;
        if ($result === true) {
            return;
        }
    }
}

require_once __DIR__ . '/app/core/Router.php';
require_once __DIR__ . '/app/controllers/ProductController.php';

$router = new Router();

$router->get('/', [ProductController::class, 'index']);
$router->get('/create', [ProductController::class, 'create']);
$router->post('/store', [ProductController::class, 'store']);
$router->get('/show/{id}', [ProductController::class, 'show']);

$uri = $_SERVER['REQUEST_URI'];
$method = strtoupper($_SERVER['REQUEST_METHOD']);

$router->dispatch($uri, $method);
?>
