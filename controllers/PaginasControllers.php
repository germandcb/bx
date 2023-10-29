<?php

namespace Controllers;

use Model\Entrada;
use Model\Usuario;
use MVC\Router;

class PaginasControllers {
    public static function index(Router $router) {
        $router->render('paginas/index', []);
    }
    public static function about(Router $router) {
        $router->render('paginas/about', []);
    }
    public static function entrada(Router $router){
        $id = validarORedireccionar('/');

        // Buscar la entrada por su id
        $entrada = Entrada::find($id);
        $usuario = Usuario::find($entrada->usuario_id);
        $router->render('paginas/entrada', [
            "entrada" => $entrada,
            "usuario" => $usuario
        ]);
    }
}

?>