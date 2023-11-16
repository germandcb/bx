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
        $entrada = new Entrada;
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){            
           $entrada->setFechaCreacion();
           $entrada->setusuarioId($_SESSION['id']);
           $entrada->sincronizar($_POST);
           $alertas = $entrada->validar();
           if(empty($alertas)){
                $resultado = $entrada->guardar();
                if ($resultado) {
                    header('Location: /blog/mis-entradas');
                }
           }
        }
        
        $router->render("blog/crear-entrada", [
            "alertas" => $alertas,
            "entrada" => $entrada
        ]);
    }

    public static function actualizar(Router $router) {    
        $alertas = [];
        $id = validarORedireccionar('/blog/mis-entradas');
        $entrada = Entrada::find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Asignar los atributos
            $args = $_POST;

            // Sincronizar datos de la propiedad
            $entrada->sincronizar($args);

            // Validacion
            $alertas = $entrada->validar();

            if(empty($alertas)){
                $resultado = $entrada->guardar();
                if ($resultado) {
                    header('Location: /blog/mis-entradas');
                }
            }
        }

        $router->render("blog/actualizar-entrada",[
            "alertas" => $alertas,
            "entrada" => $entrada
        ]);
        
    }

    public static function misEntradas(Router $router) {
        $usuario = new Usuario($_SESSION);

        $entradas = Entrada::misEntradas('usuario_id', $usuario->id);

        $router->render("blog/mis-entradas", [
            "entradas" => $entradas,
            "usuario" => $usuario
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $entrada = Entrada::find($id);
                    $resultado = $entrada->eliminar();
                    if ($resultado) {
                      header('Location: /blog/mis-entradas');
                    }
                }
            }
        }
    }

}
?>