<?php 
namespace Controllers;
use Model\Entrada;
use Model\Usuario;
use MVC\Router;

class BlogController {
    public static function index(Router $router) { 
        $auth = $_SESSION['login'] ?? false;   

        $usuario = new Usuario($_SESSION);
        $entradas = Entrada::all();
        $router->render("blog/index", [
            "auth"=> $auth,
            "usuario" => $usuario,
            "entradas" => $entradas
        ]);
    }

    public static function crear(Router $router) {    
        $router->render("blog/crear-entrada");
    }

    public static function actualizar(Router $router) {    
        $router->render("blog/actualizar-entrada");
    }

    public static function misEntradas(Router $router) {
        $usuario = new Usuario($_SESSION);

        $entradas = Entrada::misEntradas('usuario_id', $usuario->id);

        $router->render("blog/mis-entradas", [
            "entradas" => $entradas,
            "usuario" => $usuario
        ]);
    } 

}
?>