<?php

namespace Model;

class AdminProduct extends ActiveRecord {
    protected static $tabla = 'reservations_products';
    protected static $columnasDB = ['id', 'time', 'client_name', 'email', 'phone_number', 'product', 'price'];

    public $id;
    public $time;
    public $client_name;
    public $email;
    public $phone_number;
    public $product;
    public $price;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';
        $this->time = $args['time'] ?? '';
        $this->client_name = $args['client_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->phone_number = $args['phone_number'] ?? '';
        $this->product = $args['product'] ?? '';
        $this->price = $args['price'] ?? '';
    }
}
