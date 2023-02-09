<?php

namespace Controllers;

use Model\Product;
use MVC\Router;


class ProductController {
    public static function index(Router $router) {
        if(!isset($_SESSION)) 
            session_start();
        isAdmin();

        $products = Product::all();

        $router->render('products/index', [
            'name' => $_SESSION['name'],
            'products' => $products
        ]);
    }

    public static function add_product(Router $router) {
        if(!isset($_SESSION)) 
            session_start();

        isAdmin();

        $product = new Product();
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product->sincronizar($_POST);
            $alerts = $product->validateProduct();

            if(empty($alerts)) {
                $product->guardar();
                header('Location: /products');
            }
        }
        $router->render('products/add_product', [
            'name' => $_SESSION['name'],
            'product' => $product,
            'alerts' => $alerts
        ]);
    }

    public static function edit_product(Router $router) {
        if(!isset($_SESSION)) 
            session_start();

        isAdmin();

        $product = Product::find($_GET['id']);
        $alerts = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product->sincronizar($_POST);

            $alerts = $product->validateProduct();

            if(empty($alerts)) {
                $product->guardar();
                header('Location: /products');
            }
        }
        $router->render('products/edit_product', [
            'name' => $_SESSION['name'],
            'product' => $product,
            'alerts' => $alerts
        ]);
    }

    public static function delete_product() {
        if(!isset($_SESSION)) 
            session_start();

        isAdmin();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $service = Product::find($id);
            $service->eliminar();
            header('Location: /products');
        }
    }
}