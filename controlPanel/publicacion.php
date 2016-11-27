<?php
include ('header.php');
//autoloader para cargar clases
require_once(__DIR__.'/../classes/autoloader.php');
require_once(__DIR__.'/../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>
<div id="crear_oferta" class="right_col" role="main">
  <div class="z-row">
    <div class="z-col-lg-4 z-col-md-4 z-col-sm-6 z-col-xs-12">
      <h1>Crear publicacion</h1>
      <form id="formPost" class="form-section" action="upload.php" method="post" enctype="multipart/form-data">
        <div class="clear"></div>
        <input id="postTitle" type="text" class="form-control" placeholder="Nombre de la oferta">
        <div class="clear"></div>
        <textarea id="postDescription" class="form-control h100" rows="4" placeholder="Descripción"></textarea>
        <div class="clear"></div>
        <input id="postDate" class="form-control" type="date" name="name" value="">
        <div class="clear"></div>
        <select id="category" name="category" class="form-control" >
        </select>
        <div class="clear"></div>
      <input type="file" id="file" name="file" class="form-control" accept="image/*">
      <div class="clear"></div>
        <button type="button" id="createPost" class="z-btn bgGreen cWhite"  name="button">Crear</button>
      </form>
      <div class="clear h100"></div>
    </div>
     <div class="z-col-lg-4 z-col-md-4 z-col-sm-6 z-col-xs-12 hidden">
      <h1>Crear Categoria</h1>
      <form id="formCat" class="form-section" action="" method="post">
        <div class="clear"></div>
        <input id="categoryTitle" type="text" class="form-control" placeholder="Nombre de Categoria">
        <div class="clear"></div>
        <textarea id="descriptionx" class="form-control h100" rows="4" placeholder="Descripción"></textarea>
        <div class="clear"></div>
        <button type="button" id="createCategory" class="z-btn bgGreen cWhite" name="createCategory">Crear</button>
      </form>
      <div class="clear h100"></div>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
