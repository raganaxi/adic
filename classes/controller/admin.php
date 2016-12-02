<?php

/*invocacion de clases*/
use pdomysql AS pdomysql;
use admin AS admin;

class admin
{

  //envio de Email
  public static function sendEmailActivation($mail, $user, $pass){
    $subject = "Activacion 'A donde ir en la ciudad'";
    //Cuerpo del email
    $message = "
      <html>
      <head>
      <title>HTML email</title>
      </head>
      <body>
      <p>This email contains HTML Tags!</p>
      <table>
      <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      </tr>
      <tr>
      <td>John</td>
      <td>Doe</td>
      </tr>
      </table>
      </body>
      </html>
      ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From: Administrador<reiter.der.schwarzung@gmail.com>' . "\r\n";
    $headers .= 'Cc: ae.tello@hotmail.com' . "\r\n";
    mail($mail,$subject,$message,$headers);
  }
}

?>
