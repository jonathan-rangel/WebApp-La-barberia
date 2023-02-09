<?php

namespace Controllers;

use Model\AdminProduct;
use Model\AdminReservation;
use Model\ReservationProduct;
use MVC\Router;

class AdminController {
    public static function index(Router $router) {
        if(!$_SESSION)
            session_start();

        isAdmin();
        $date = $_GET['date'] ?? date('Y-m-d', strtotime('-6 hours'));

        $date_check = explode('-', $date);

        if(!checkdate($date_check[1], $date_check[2], $date_check[0]))
            header('Location: /404');


        //Consultar a la DB
        $query_ser = "SELECT reservations.id, reservations.time, CONCAT(users.name, ' ', users.last_name) as client_name,";
        $query_ser .= " users.email, users.phone_number, services.name as service, services.price";
        $query_ser .= " FROM reservations";
        $query_ser .= " LEFT OUTER JOIN users";
        $query_ser .= " ON reservations.userId=users.id";
        $query_ser .= " LEFT OUTER JOIN reservations_services";
        $query_ser .= " ON reservations_services.reservationId=reservations.id";
        $query_ser .= " LEFT OUTER JOIN services";
        $query_ser .= " ON services.id=reservations_services.serviceId";
        $query_ser .= " WHERE date =  '${date}' ";

        $reservations_ser = AdminReservation::SQL($query_ser);

        //Consultar a la DB
        $query_pro = "SELECT reservations.id, reservations.time, CONCAT(users.name, ' ', users.last_name) as client_name,";
        $query_pro .= " users.email, users.phone_number, products.name as product, products.price";
        $query_pro .= " FROM reservations";
        $query_pro .= " LEFT OUTER JOIN users";
        $query_pro .= " ON reservations.userId=users.id";
        $query_pro .= " LEFT OUTER JOIN reservations_products";
        $query_pro .= " ON reservations_products.reservationId=reservations.id";
        $query_pro .= " LEFT OUTER JOIN products";
        $query_pro .= " ON products.id=reservations_products.productId";
        $query_pro .= " WHERE date =  '${date}' ";

        $reservations_pro = AdminProduct::SQL($query_pro);
        // debuguear($reservations_ser);
    

        $router->render('admin/index', [
            'name' => $_SESSION['name'],
            'reservations' => $reservations_ser,
            'products' => $reservations_pro,
            'date' => $date
        ]);
    }
}