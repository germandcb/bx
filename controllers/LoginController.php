<?php
namespace Controllers;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            debuguear($_POST);
        }
        $router->render("auth/login");
    }
    public static function logout() {
        echo "Desde logout";
    }
    public static function olvide() {
        echo "Desde olvide";
    }
    public static function recuperar() {
        echo "Desde recuperar";
    }
    public static function crear(Router $router) {

        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            debuguear($_POST);
        }
        $router->render("auth/check-in");
    }
}
?>