<?php

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $apellido = $_POST['apellido'];
        $pais = $_POST['pais'];
        $ciudad = $_POST['ciudad'];

        $to      = 'hola@XXX.com';
        $subject = 'Contacto XXX: '. $asunto;
        $message .= "Hola, <br>";
        $message .= "Tenemos un mensaje nuevo de <b>" . $nombre . " " . $apellido . "</b>.<br>";
        $message .= "<b>Pais:</b> " . $pais . " - <b>Ciudad:</b> " . $ciudad . "<br><br>";
        $message .= $mensaje;
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: no-reply@XXX.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion() . "\r\n" .
            "Content-type:text/html;charset=UTF-8" . "\r\n";

        $success = mail($to, $subject, $message, $headers);

        
        if($success){
            echo  "success";
        }else{
            echo "failed";
        }


?>