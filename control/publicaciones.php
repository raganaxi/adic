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
<div id="crear_oferta" class="right_col" role="main">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mis Publicaciones</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive hidden">
            <table id="publicacionesSocio" class="table table-hover jambo_table">
              <thead>
                <tr>
                  <th>Mail</th>
                  <th>Contacto</th>
                  <th>Telefono</th>
                  <th>Negocio</th>
                  <th>Password</th>
                  <!-- <th>Rol</th> -->
                  <!-- <th>Estatus</th> -->
                  <th>Tipo de registro</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                /*$posts = user::getPostsSocio($_SESSION['user']);

                foreach ($posts as $key => $value) {

                  $posts[$key]['active'] = ($posts[$key]['active'] == 0)? 'Inactivo' : 'activo';

                  $row = '<tr>'.
                    '<td>'.$posts[$key]['username'].'</td>'.
                    '<td>'.$posts[$key]['name'].'</td>'.
                    '<td>'.$posts[$key]['number'].'</td>'.
                    '<td>'.$posts[$key]['negocio'].'</td>'.
                    '<td>'.$posts[$key]['pass'].'</td>'.
                    '<td>'.$posts[$key]['reg_type'].'</td>'.
                  '</tr>';
                  echo $row;
                }*/
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 pull-right">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear publicacion</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
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
            <button type="button" id="createPost" class="btn bgGreen cWhite s20 text-center noTransform boxShadow pull-right" name="button">Crear</button>
          </form>
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
        <button type="button" id="createCategory" class="z-btn bgGreen cWhite" name="createCategory">Crear</button>
      </form>
      <div class="clear h100"></div>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
