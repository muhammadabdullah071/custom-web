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
        header("Location: $url");
        exit;
    }
}
?>
