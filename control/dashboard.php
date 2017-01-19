<?php
  include ('header.php');
  require_once(__DIR__.'/../classes/autoloader.php');
  require_once(__DIR__.'/../config.php');

  //invocacion de clases
  use pdomysql AS pdomysql;
  use user AS user;

  if(!isset($_SESSION['rol'])){
    header('Location: '.'index.php');
  } else {
    if($_SESSION['rol'] == 'usuario' ){
      header('Location: '.'logout.php');
    }
  }
?>
  <?php if($_SESSION['rol'] == 'administrador') {
    include ('admin.php');
  } else if($_SESSION['rol'] == 'socio') {
    include ('socio.php');
  } ?>
<?php include __DIR__.'/footer.php'; ?>
