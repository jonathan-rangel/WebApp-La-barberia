<?php

namespace Model;

class Comment extends ActiveRecord {
     //Base de datos
    protected static $tabla = 'comments';
    protected static $columnasDB = ['id', 'userId', 'user_name', 'date', 'comment_details'];

    public $id;
    public $userId;
    public $user_name;
    public $date;
    public $comment_details;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->userId = $args['userId'] ?? null;
        $this->user_name = $args['user_name'] ?? '';
        $this->date = $args['date'] ?? null;
        $this->comment_details = $args['comment_details'] ?? '';
    }

    public function validateComment() {
        if(!$this->comment_details)
            self::$alertas['error'][] = 'Debes agregar un comentario, de lo contrario puedes eliminarlo';

        return self::$alertas;
    }


}