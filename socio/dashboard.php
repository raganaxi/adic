<?php
include ('../header.php');
//autoloader para cargar clases
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>

<?php include ('../footer.php'); ?>
