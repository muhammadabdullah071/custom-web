<?php
class Router {
    private $routes = [];

    public function get($pattern, $action) {
        $this->routes['GET'][] = ['pattern' => $pattern, 'action' => $action];
    }

    public function post($pattern, $action) {
        $this->routes['POST'][] = ['pattern' => $pattern, 'action' => $action];
    }

    public function dispatch($uri, $method) {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = $_SERVER['PATH_INFO'] ?? $path;
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';

        if ($scriptName && strpos($path, $scriptName) === 0) {
            $path = substr($path, strlen($scriptName));
        } else {
            $scriptDir = dirname($scriptName);
            if ($scriptDir !== '/' && strpos($path, $scriptDir) === 0) {
                $path = substr($path, strlen($scriptDir));
            }
        }

        $path = '/' . ltrim($path, '/');
        $path = rtrim($path, '/') ?: '/';

        foreach (($this->routes[$method] ?? []) as $route) {
            $pattern = $route['pattern'];
            $regex = '#^' . preg_quote($pattern, '#') . '$#';
            $regex = str_replace('\\{id\\}', '(\d+)', $regex);

            if (preg_match($regex, $path, $matches)) {
                array_shift($matches);
                [$controller, $methodName] = $route['action'];
                $instance = new $controller();
                return call_user_func_array([$instance, $methodName], $matches);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
?>
