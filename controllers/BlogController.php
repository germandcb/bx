<?php 
namespace Controllers;
use MVC\Router;

class BlogController {
    public static function index(Router $router) {    
        $router->render("blog/index");
    }

    public static function crear(Router $router) {    
        $router->render("blog/crear-entrada");
    }

    public static function actualizar(Router $router) {    
        $router->render("blog/actualizar-entrada");
    }
}
?>