<?php

namespace Model;

class Product extends ActiveRecord {
     //Base de datos
     protected static $tabla = 'products';
     protected static $columnasDB = ['id', 'name', 'price', 'description', 'image'];
 
     public $id;
     public $name;
     public $price;
     public $description;
     public $image;
 
     public function __construct($args = []) {
         $this->id = $args['id'] ?? null;
         $this->name = $args['name'] ?? '';
         $this->price = $args['price'] ?? null;
         $this->description = $args['description'] ?? '';
         $this->image = $args['image'] ?? '';
     }

     public function validateProduct() {
        if(!$this->name)
            self::$alertas['error'][] = 'Debes agregar un nombre al prodcuto';
        if(!$this->price)
            self::$alertas['error'][] = 'Debes agregar un precio al prodcuto';
        if(!$this->description)
            self::$alertas['error'][] = 'Debes agregar una descripción al prodcuto';
        if(!$this->image)
            self::$alertas['error'][] = 'Debes agregar una URL de imagen al prodcuto';

        return self::$alertas;
    }
}