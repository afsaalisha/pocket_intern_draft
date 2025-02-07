<?php
class App {
    public function __construct() {
        $url = rtrim($_GET['url'] ?? 'home', '/');
        $controllerName = ucfirst(preg_replace('/[^a-z0-9_-]/i', '', $url)) . "Controller";  // Sanitize controller name
        $controllerFile = __DIR__ . "/../app/controllers/$controllerName.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();
            $controller->index();
        } else {
            echo "Page not found! Controller does not exist.";
            exit;
        }
    }
}
