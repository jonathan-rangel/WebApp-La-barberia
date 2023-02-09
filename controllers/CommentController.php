<?php

namespace Controllers;

use Model\Comment;
use MVC\Router;

class CommentController {
    public static function add_comment(Router $router) {
        if(!isset($_SESSION)) 
            session_start();

        isAuth();

        $comment = new Comment();
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment->sincronizar($_POST);
            $alerts = $comment->validateComment();

            if(empty($alerts)) {
                $comment->userId = $_SESSION['id'];
                $comment->user_name = $_SESSION['name_last'];
                $comment->date = date('Y-m-d', strtotime('-6 hours'));
                $comment->guardar();
                header('Location: /reservation');
            }
        }
        $router->render('comments/add_comment', [
            'name_last' => $_SESSION['name_last'],
            'comment' => $comment,
            'alerts' => $alerts
        ]);
    }

    public static function edit_comment(Router $router) {
        $comment = Comment::find($_GET['id']);
        $alerts = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment->sincronizar($_POST);

            $alerts = $comment->validateComment();

            if(empty($alerts)) {
                $comment->date = date('Y-m-d', strtotime('-6 hours'));
                $comment->guardar();
                header('Location: /reservation');
            }
        }

        $router->render('comments/edit_comment', [
            'name_last' => $_SESSION['name_last'],
            'comment' => $comment,
            'alerts' => $alerts
        ]);
    }

    public static function delete_comment() {
        if(!isset($_SESSION)) 
            session_start();

        isAuth();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $comment = Comment::find($id);
            $comment->eliminar();
            header('Location: /reservation');
        }
    }
}