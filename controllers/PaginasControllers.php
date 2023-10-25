<?php

namespace Controllers;

use MVC\Router;

class PaginasControllers {
    public static function index(Router $router) {
        $router->render('paginas/index', []);
    }
    public static function about(Router $router) {
        $router->render('paginas/about', []);
    }
}

?>