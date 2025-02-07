<?php
class Controller {
    protected function view($viewName) {
        require_once __DIR__ . "/../app/views/{$viewName}.php";
    }
}

