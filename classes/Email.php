<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $name;
    public $token;
    public function __construct($email, $name, $token){
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
    }

    public function sendConfirmation() {
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = 'web.app.la.barberia@gmail.com';
        $mail->Password = 'hkdhiwjdimkqpahm';
        $mail->SMTPSecure = 'ssl';

        $mail->setFrom('web.app.la.barberia@gmail.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $content = "<html>";
        $content .= "<p><strong>Hola " . $this->name . "</strong> Has creado tu cuenta en La barbería.
        Debes confirmar tu cuenta presionando el siguiente enlace.</p>";
        $content .= "<p>Presiona aquí: <a href='https://" . $_SERVER["HTTP_HOST"] . "/confirm_account?token=" . $this->token . "'>Confirmar cuenta</a></p>";
        $content .= "<p>Si no solicitaste esta confirmación puedes ignorar este correo.</p>";
        $content .= "<p>La barbería</p>";
        $content .= "</html>";
        $mail->Body = $content;

        //Enviar email
        $mail->send();


    }

    public function sendInstructions() {
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = 'web.app.la.barberia@gmail.com';
        $mail->Password = 'hkdhiwjdimkqpahm';
        $mail->SMTPSecure = 'ssl';

        $mail->setFrom('web.app.la.barberia@gmail.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Reestablecer tu contraseña';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $content = "<html>";
        $content .= "<p><strong>Hola " . $this->name . "</strong> Se ha solicitado restablecer
        la contraseña. Da clic en el siguiente enlace para restablecerla</p>";
        $content .= "<p>Presiona aquí: <a href='http://localhost:3000/recover_password?token=" . $this->token . "'>Restablecer la contraseña</a></p>";
        $content .= "<p>Si no solicitaste restablecer la contraseña puedes ignorar este correo.</p>";
        $content .= "<p>La barbería</p>";
        $content .= "</html>";
        $mail->Body = $content;

        //Enviar email
        $mail->send();
    }
}
