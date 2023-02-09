<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\CommentController;
use Controllers\LoginController;
use Controllers\ProductController;
use Controllers\ReservationController;
use Controllers\ServiceController;
use Controllers\UserController;
use MVC\Router;

$router = new Router();

//Página principal
$router->get('/', [LoginController::class, 'home']);
$router->post('/', [LoginController::class, 'home']);

//Iniciar sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

//Cerrar sesióm
$router->get('/logout', [LoginController::class, 'logout']);

//Recuperar contraseña
$router->get('/forgot_password', [LoginController::class, 'forgot_password']);
$router->post('/forgot_password', [LoginController::class, 'forgot_password']);
$router->get('/recover_password', [LoginController::class, 'recover_password']);
$router->post('/recover_password', [LoginController::class, 'recover_password']);

//Crear cuenta
$router->get('/create_account', [LoginController::class, 'create_account']);
$router->post('/create_account', [LoginController::class, 'create_account']);

//Confirmar cuenta
$router->get('/confirm_account', [LoginController::class, 'confirm_account']);
$router->get('/message', [LoginController::class, 'message']);

//Area de usuarios
$router->get('/reservation', [ReservationController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);

//API de citas, productos y comentarios
$router->get('/api/services', [APIController::class, 'getServices']);
$router->get('/api/products', [APIController::class, 'getProducts']);
$router->get('/api/comments/all', [APIController::class, 'getCommentsAll']);
$router->get('/api/comments/user', [APIController::class, 'getCommentsUser']);
$router->post('/api/reservations', [APIController::class, 'save']);
$router->post('/api/delete', [APIController::class, 'delete']);

//CRUD de usuario
$router->get('/user', [UserController::class, 'index']);
$router->get('/user/edit', [UserController::class, 'edit_user']);
$router->post('/user/edit', [UserController::class, 'edit_user']);
$router->get('/user/reservations', [UserController::class, 'edit_reservations']);
$router->post('/user/reservations', [UserController::class, 'edit_reservations']);

//CRUD de servicios
$router->get('/services', [ServiceController::class, 'index']);
$router->get('/services/add', [ServiceController::class, 'add_service']);
$router->post('/services/add', [ServiceController::class, 'add_service']);
$router->get('/services/edit', [ServiceController::class, 'edit_service']);
$router->post('/services/edit', [ServiceController::class, 'edit_service']);
$router->post('/services/delete', [ServiceController::class, 'delete_service']);

//CRUD de productos
$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/add', [ProductController::class, 'add_product']);
$router->post('/products/add', [ProductController::class, 'add_product']);
$router->get('/products/edit', [ProductController::class, 'edit_product']);
$router->post('/products/edit', [ProductController::class, 'edit_product']);
$router->post('/products/delete', [ProductController::class, 'delete_product']);

//CRUD de comentarios
$router->get('/comments/add', [CommentController::class, 'add_comment']);
$router->post('/comments/add', [CommentController::class, 'add_comment']);
$router->get('/comments/edit', [CommentController::class, 'edit_comment']);
$router->post('/comments/edit', [CommentController::class, 'edit_comment']);
$router->post('/comments/delete', [CommentController::class, 'delete_comment']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();