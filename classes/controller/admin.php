<?php

/*invocacion de clases*/
use pdomysql AS pdomysql;
use admin AS admin;

class admin
{

    public static function sendEmailWelCome($mail, $user, $pass, $nameContact){error_log(print_r($mail.' '.$user.' '.$pass.' '.$nameContact,true));
    $subject = "Activacion 'A donde ir en la ciudad'";
    $time = time();
    $fecha = date("Y-m-d (H:i:s)", $time) ;
    //Cuerpo del email
    $email_message = file_get_contents("../templates/email/bienvenido.html");
    $email_message = str_replace('####ANUNCIANTE####', $nameContact, $email_message);
    $email_message = str_replace('####USER####', $user, $email_message);
    $email_message = str_replace('####PASS####', $pass, $email_message);
    /*$email_message = preg_replace('/\\\\/','', $email_message);*/
    $headers = "From: info@adondeirenlaciudad.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    return mail($mail, $subject, $email_message, $headers);
    }

  //envio de Email
  public static function sendEmailActivation($mail, $user, $pass, $nameContact){
    $subject = "Activacion 'A donde ir en la ciudad'";
    //Cuerpo del email
    $email_message = file_get_contents("../templates/email/bienvenido_socio.html");
    $email_message = str_replace('###NOMBRE_CONTACTO###', $nameContact, $email_message);
    $email_message = str_replace('###USUARIO###', $user, $email_message);
    $email_message = str_replace('###MAIL###', $mail, $email_message);
    $email_message = str_replace('###PASSWORD###', $pass, $email_message);
    //$email_message = preg_replace('/\\\\/','', $email_message);
    $headers = "From: bienvenido@adondeirenlaciudad.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    return mail($mail, $subject, $email_message, $headers);
  }
  public static function cron($mail=null, $user=null, $nameContact=null,$fecha=null){
    if($mail==null)
        $mail="raganaxi@gmail.com,alkoba.sandoval13@gmail.com";
    $subject = "cron 'A donde ir en la ciudad'";
    if ($fecha==null) {
        $fecha="";
    }
    $time = time();
    $fecha = date("Y-m-d (H:i:s)", $time) ;
    //Cuerpo del email
    $email_message = file_get_contents("../templates/email/cron.html");
    $email_message = str_replace('###FECHA###', $fecha, $email_message);
    /*$email_message = str_replace('###USUARIO###', $user, $email_message);
    $email_message = str_replace('###MAIL###', $mail, $email_message);
    $email_message = str_replace('###PASSWORD###', $pass, $email_message);
    $email_message = preg_replace('/\\\\/','', $email_message);*/
    $headers = "From: info@adondeirenlaciudad.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    return mail($mail, $subject, $email_message, $headers);
  }
}

?>
