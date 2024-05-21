<?php 

namespace Controllers;

use Model\Anuncio;
use MVC\Router;

class AnuncioController {
    public static function index(Router $router) {

        isAdmin();
        $anuncios = Anuncio::all();

        $router->render('anuncio/index', [
            'anuncios' => $anuncios, 
        ]);
    }
    public static function crear(Router $router) {
        
        isAdmin();
        $anuncio = new Anuncio;
        $alertas = [];
        $usuarioId = $_SESSION['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
            $anuncio->sincronizar($_POST);

            $alertas = $anuncio->validar();

            if(empty($alertas)) {
                $anuncio->guardar();
                header('Location: /anuncios');
            }
        }

        $router->render('anuncio/crear', [
            'alertas' => $alertas,
            'anuncio' => $anuncio,
            'usuarioId' => $usuarioId
        ]);
    }
    public static function actualizar(Router $router) {

        isAdmin();
        $alertas = [];
        $id = validarORedireccionar('/anuncios');
        $anuncio = Anuncio::find($id);
        $usuarioId = $_SESSION['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Sincronizar datos de la propiedad
            $anuncio->sincronizar($_POST);

            // Validacion
            $alertas = $anuncio->validar();

            if(empty($alertas)){
                $resultado = $anuncio->guardar();
                if ($resultado) {
                    header('Location: /anuncios');
                }
            }
        }

        $router->render('anuncio/actualizar', [
            'alertas' => $alertas,
            'anuncio' => $anuncio,
            'usuarioId' => $usuarioId
        ]);
    }
    public static function eliminar(Router $router) {

        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $anuncio = Anuncio::find($id);
                    
                    $resultado = $anuncio->eliminar();
                    if ($resultado) {
                      header('Location: /anuncios');
                    }
                }
            }
        }
    }
}

?>