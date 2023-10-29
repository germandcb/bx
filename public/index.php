<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\PaginasControllers;
use MVC\Router;

$router = new Router();

// paginas adicionales ZONA PUBLICA
$router->get('/', [PaginasControllers::class,'index']);
$router->get('/about', [PaginasControllers::class,'about']);


// Iniciar Sesión
$router->get('/login', [LoginController::class,'login']);
$router->post('/login', [LoginController::class,'login']);
$router->post('/logout', [LoginController::class,'logout']);   

// Crear cuenta
$router->get('/registrarse', [LoginController::class,'crear']);
$router->post('/registrarse', [LoginController::class,'crear']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();