<?php
namespace Controllers;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                // Comprobar que el usuario exista
                $usuario = Usuario::where('username', $auth->username);

                if ($usuario) {
                    
                    // Verificar la contraseña
                    if ($usuario->comprobarContrasena($auth->contrasena)) {

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['username'] = $usuario->username; 
                        $_SESSION['correo'] = $usuario->correo;
                        $_SESSION['login'] = true;

                        // Redireccionamiento
                        header('Location: /blog');
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no econtrado o no existe');
                }
            } 
        }
        $alertas = Usuario::getAlertas();
        $router->render("auth/iniciar-sesion", [
            "alertas" => $alertas
        ]);
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

        $alertas = [];
        $usuario = new Usuario;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // Revisar que el arreglo este vacio
            if (empty($alertas)) {
                //Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if (!$resultado->num_rows) {
                    //hashear el password
                    $usuario->hashPassword();

                    // Guardar Usuario
                    $resultado = $usuario->guardar();
                    if ($resultado) {
                        header('Location: /');
                    }
                }
            }
        }
        $alertas = Usuario::getAlertas();
        $router->render("auth/registrarse", [
            "usuario" => $usuario,
            "alertas" => $alertas
        ]);
    }
}
?>