<?php

namespace Controllers;

use Model\Comment;
use Model\Product;
use Model\Reservation;
use Model\ReservationProduct;
use Model\ReservationService;
use Model\Service;
use Model\Usuario;
use MVC\Router;

class UserController {
    public static function index(Router $router) {
        $user = Usuario::find($_SESSION['id']);

        $router->render('user/index', [
            'user' => $user
        ]);
    }

    public static function edit_user(Router $router) {
        if(!isset($_SESSION)) 
            session_start();

        isAuth();

        $user = Usuario::find($_SESSION['id']);
        $alerts = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sincronizar($_POST);

            $alerts = $user->validateUser();
            $comments = Comment::whereAll('userId', $_SESSION['id']);

            if(empty($alerts)) {
                $_SESSION['name_last'] = $user->name . ' ' . $user->last_name;
                $_SESSION['email'] = $user->email;
                foreach($comments as $comment) {
                    $comment->user_name = $user->name . ' ' . $user->last_name;
                    $comment->guardar();
                }
                // $comments->guardar();
                $user->guardar();
                header('Location: /user');
            }
        }
        $router->render('user/edit_user', [
            'user' => $user,
            'alerts' => $alerts
        ]);
    }

    public static function edit_reservations(Router $router) {
        if(!isset($_SESSION)) 
            session_start();

        $id = $_SESSION['id'];
        $name_last = $_SESSION['name_last'];

        $reservations = Reservation::all();
        $services = ReservationService::all();
        $products = ReservationProduct::all();
        $list_services = Service::all();
        $list_products = Product::all();

        isAuth();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $comment = Reservation::find($id);
            $comment->eliminar();
            header('Location: /user/reservations');
        }

        $router->render('user/edit_reservations', [
            'id' => $id,
            'name_last' => $name_last,
            'reservations' => $reservations,
            'services' => $services,
            'products' => $products,
            'list_services' => $list_services,
            'list_products' => $list_products
        ]);
    }
}