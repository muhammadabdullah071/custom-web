<?php
class Router {
    private $routes = [];

    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri, $method) {
        $parsedUrl = parse_url($uri);
        $path = $parsedUrl['path'] ?? '';
        $query = $parsedUrl['query'] ?? '';

        if ($path === '' || $path === '/' || substr($path, -1) === '/') {
            $uri = 'index.php';
        } else {
            $pathInfo = pathinfo($path);
            if (empty($pathInfo['extension'])) {
                $uri = 'index.php';
            } else {
                $uri = basename($path);
            }
        }
        if ($query !== '') {
            $uri .= '?' . $query;
        }

        // Check for dynamic routes like index.php?action=show&id={id}
        foreach (($this->routes[$method] ?? []) as $route => $action) {
            $pattern = preg_quote($route, '#');
            $pattern = str_replace('\{id\}', '(\\d+)', $pattern);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                [$controller, $methodName] = $action;
                $controllerInstance = new $controller();
                return call_user_func_array([$controllerInstance, $methodName], $matches);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
?>
