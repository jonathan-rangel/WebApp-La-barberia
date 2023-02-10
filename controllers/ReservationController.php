<?php

namespace Controllers;

use Model\Service;
use Model\Product;
use MVC\Router;

class ReservationController {
    public static function index(Router $router) {
        if(!$_SESSION)
            session_start();
        
        isAuth();

        $services = Service::all();
        $products = Product::all();

        $router->render('reservation/index', [
            'name_last' => $_SESSION['name_last'],
            'id' => $_SESSION['id'],
            'services' => $services,
            'products' => $products,
        ]);
    }
}

