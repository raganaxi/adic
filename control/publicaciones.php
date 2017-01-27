<?php
include ('header.php');

if(!isset($_SESSION['rol'])){
  header('Location: '.'index.php');
} else {
  if($_SESSION['rol'] == 'usuario' ){
    header('Location: '.'logout.php');
  }
}
?>
<style type="text/css">
  .btnSuccess{
   background-color:  #3085d6;
   border-color: #3085d6;
  }
</style>
<div id="crear_oferta" class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">

        <div class="x_content">
          <section id="sectionPost" class="z-container mainContainer">
            <div class="z-row">
              <div id="postContainer" class="z-col-lg-6 z-col-md-6 z-col-sm-10 z-col-xs-12 z-col-lg-offset-3 z-col-md-offset-3 z-col-sm-offset-1 z-col-xs-offset-0 scroll">
              </div>

            </div>
          </section>
        <div class="x_title">
          <h2>Mis Publicaciones</h2><button id="btnAddPosts" title="Crear una nueva Publicacion" class="btn bgGreen cWhite pull-right fa fa-plus btnPlus"></button>
          <div class="clearfix"></div>
        </div>
                <table id="tablePub" class="display" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>usId</th>
                    <th>Imagen</th>
                    <th>Editar/<br>Eliminar</th>
                    <th>status</th>
                    </tr>
                  </thead>
                </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hidden">
      <h1>Crear Categoria</h1>
      <form id="formCat" class="form-section" action="" method="post">
        <div class="clear"></div>
        <input id="categoryTitle" type="text" class="form-control" placeholder="Nombre de Categoria">
        <div class="clear"></div>
        <textarea id="descriptionx" class="form-control h100" rows="4" placeholder="Descripción"></textarea>
        <div class="clear"></div>
        <div class="progress progress-striped active">
          <div class="progress-bar" style="width:0%"></div>
        </div>
        <button type="button" id="createCategory" class="z-btn bgGreen cWhite" name="createCategory">Crear</button>
      </form>
      <div class="clear h100"></div>
    </div>
  </div>
</div>

<?php include ('footer.php'); ?>
