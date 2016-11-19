<!DOCTYPE html>
<html>
  <head>
  <?php
  require_once('../classes/autoloader.php');
  require_once('../config.php');

  //invocacion de clases
  use pdomysql AS pdomysql;
  use user AS user;

  ?>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <div id="login">
      <form name='form-login'>
        <span class="fontawesome-user"></span>
        <input type="text" id="user" placeholder="Username">
        <span class="fontawesome-lock"></span>
        <input type="password" id="pass" placeholder="Password">
        <input id="loginAdmin" type="button" value="Login">
      </form>
    </div>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/scripts.js" type="text/javascript"></script>
  </body>
</html>
