<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\BlogController;
use Controllers\LoginController;
use Controllers\PaginasControllers;
use Controllers\AnuncioController;
use MVC\Router;

$router = new Router();

// paginas adicionales ZONA PUBLICA
$router->get('/', [PaginasControllers::class,'index']);
$router->get('/about', [PaginasControllers::class,'about']);
$router->get('/blog/entrada', [PaginasControllers::class,'entrada']);

// Iniciar Sesión
$router->get('/iniciar-sesion', [LoginController::class,'login']);
$router->post('/iniciar-sesion', [LoginController::class,'login']);
$router->get('/cerrar-sesion', [LoginController::class,'logout']);   

// Crear cuenta
$router->get('/registrarse', [LoginController::class,'crear']);
$router->post('/registrarse', [LoginController::class,'crear']);

// ZONA PRIVADA
$router->get('/blog/crear-entrada', [BlogController::class,'crear']);
$router->post('/blog/crear-entrada', [BlogController::class,'crear']);
$router->get('/blog/actualizar-entrada', [BlogController::class,'actualizar']);
$router->post('/blog/actualizar-entrada', [BlogController::class,'actualizar']);
$router->get('/blog/mis-entradas', [BlogController::class,'misEntradas']);
$router->post('/blog/eliminar-entrada',[BlogController::class,'eliminar']);

// Anuncios
$router->get('/anuncios', [AnuncioController::class, 'index']);
$router->get('/anuncios/crear', [AnuncioController::class, 'crear']);
$router->post('/anuncios/crear', [AnuncioController::class, 'crear']);
$router->get('/anuncios/actualizar', [AnuncioController::class, 'actualizar']);
$router->post('/anuncios/actualizar', [AnuncioController::class, 'actualizar']);
$router->post('/anuncios/eliminar', [AnuncioController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();