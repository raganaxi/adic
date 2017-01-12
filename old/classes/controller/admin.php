<?php

/*invocacion de clases*/
use pdomysql AS pdomysql;
use admin AS admin;

class admin
{

  //envio de Email
  public static function sendEmailActivation($mail, $user, $pass, $nameContact){
    $subject = "Activacion 'A donde ir en la ciudad'";
    //Cuerpo del email
    $email_message = file_get_contents("../templates/email/bienvenido_socio.html");
    $email_message = str_replace('###NOMBRE_CONTACTO###', $nameContact, $email_message);
    $email_message = str_replace('###USUARIO###', $user, $email_message);
    $email_message = str_replace('###MAIL###', $mail, $email_message);
    $email_message = str_replace('###PASSWORD###', $pass, $email_message);
    $email_message = preg_replace('/\\\\/','', $email_message);
    $headers = "From: bienvenido@adondeirenlaciudad.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    return mail($mail, $subject, $email_message, $headers);
  }
}

?>
