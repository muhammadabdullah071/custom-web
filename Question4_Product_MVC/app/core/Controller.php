<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("View '$view' not found.");
        }
    }

    protected function redirect($url) {
        if (!preg_match('#^https?://#i', $url) && strpos($url, '/') !== 0) {
            $url = '/' . ltrim($url, '/');
        }
        header("Location: $url");
        exit;
    }
}
?>
