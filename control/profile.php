<?php
include ('header.php');
//autoloader para cargar clases
//require_once(__DIR__.'/../classes/autoloader.php');
//require_once(__DIR__.'/../config.php');

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
<style type="text/css">
  .swal-xl{
    width: 80%!important;
  }
   #editProfileD .form-section{
    width: 50%;
    display: inline-block;
  }
.fa-pencil-square-o{
  font-size: x-large;
  color: blue;
  cursor: pointer;
}
.fa-pencil-square-o:hover{
  font-size: xx-large;
  color: #6706e2;
}
.fa-times{
    font-size: x-large;
  color: red;
  float: right;
  cursor: pointer;
}
.fa-times:hover{
  font-size: xx-large;
  color: #e62b89;
}

</style>    
<div id="perfil_socio" class="right_col" role="main" onload="initMap()">
  <div class="z-row">
    <div class="col-xs-12">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <div class="x_panel">
          <div class="x_title">
            <ul id="myTab" class="nav nav-tabs " role="tablist">
              <li role="presentation" ><a href="#tab_datos" id="datos-tab" role="tab" data-toggle="tab" aria-expanded="true">Perfil y Contacto</a>
              </li>
              <li role="presentation" class="active"><a href="#tab_imagenPerfil" role="tab" id="imagenPerfil-tab" data-toggle="tab" aria-expanded="false">Imagen de Perfil</a>
              </li>
              <li role="presentation" class=""><a href="#tab_direcciones" role="tab" id="direcciones-tab" data-toggle="tab" aria-expanded="false">Direcciones</a>
              </li>
              <li role="presentation" class=""><a href="#tab_acceso" role="tab" id="acceso-tab" data-toggle="tab" aria-expanded="false">Cuenta</a>
              </li>
              <li role="presentation" class=""><a href="#tab_galeria" role="tab" id="acceso-tab" data-toggle="tab" aria-expanded="false">Galeria de Imagenes </a>

              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade " id="tab_datos" aria-labelledby="datos-tab">
              <div class="x_content">
                <form id="editProfileF"><!--action="editPpicture.php" method="post" enctype="multipart/form-data"-->
                  <div class="form-section">
                    <label for="nameP">Nombre de contacto</label>
                    <input id="nameP" type="text" class="form-control" placeholder="Nombre completo" name="nameP" value="<?php echo $profile[0]['name'] ?>" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="phoneP">Telefono</label>
                    <input id="phoneP" type="text" class="form-control" placeholder="Telefono" name="phoneP" value="<?php echo $profile[0]['number'] ?>" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="emailP">Correo</label>
                    <input id="emailP" type="email" class="form-control" placeholder="E-mail" name="emailP" value="<?php echo $profile[0]['mail'] ?>" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="negocioP">Nombre del negocio</label>
                    <input id="negocioP" type="text" class="form-control" placeholder="Nombre" name="negocioP" value="<?php echo $profile[0]['negocio'] ?>" required>
                    <div class="clear"></div>
                  </div>
                  <button type="button" id="editProfile" class="btn bgGreen cWhite pull-right" >
                    Editar
                  </button>
                </form>
              </div>
              <hr>
              <div class="x_content">
                <form class="" method="post">
                  <div class="form-section">
                    <input type="hidden" id="userID" name="userID" value="<?= $profile['0']['iduser']?>">
                    <label for="usernameP">Usuario</label>
                    <input id="usernameP" type="text" class="form-control" placeholder="username" name="usernameP" value="<?php echo $profile[0]['username'] ?>" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="emailP"></label>
                    <input id="emailP" type="text" class="form-control" placeholder="E-mail" name="emailP" value="<?php echo $profile[0]['mail'] ?>" required>
                    <div class="clear"></div>
                  </div>
                  <button type="button" id="editProfileUser" class="btn bgGreen cWhite pull-right" >
                    Editar
                  </button>
                </form>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade active in " id="tab_imagenPerfil" aria-labelledby="imagenPerfil-tab">
              <div class="x_content">
                <?php   
                $directory="images/profPicture/".$_SESSION['iduser']."/";      
                $images = glob($directory . "*.*");
                ?>
                <h1>Subir su imagen de Perfil </h1>
                  <hr>
                    <div class="form-group">
                      <input id="profileImage" name="file-es[]" type="file" class="file-loading">
                    </div>

                    <form action="uploadPicture.php" method="post" enctype="multipart/form-data">
                      Select image to upload:
                      <input type="file" name="fileToUpload" id="fileToUpload">
                      <input type="submit" value="Upload Image" name="submit">
                    </form>

              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_acceso" aria-labelledby="acceso-tab">
              <div class="x_content">
                <form class="" action="">
                  <div class="form-section">
                    <label for="oldPassP">Contraseña Actual</label>
                    <input id="oldPassP" type="password" class="form-control" placeholder="" name="oldPassP" value="">
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="newPassP">Contraseña Nueva</label>
                    <input id="newPassP" type="password" class="form-control" placeholder="" name="newPassP" value="" required>
                    <div class="clear"></div>
                  </div>
                  <button type="button" id="changeAccess" class="btn bgGreen cWhite pull-right" >
                    Editar
                  </button>
                </form>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_direcciones" aria-labelledby="datos-tab">
              <div class="x_content">
              <div class="form-control">
                <button id="btnAddAddress" class="btn bgGreen cWhite pull-right">add Direccion</button>
              </div>
             
              </div>

                            <div class="x_content">
                <div class="x_title">
                  <h2>Lista de Direcciones</h2>
                  <div class="clearfix"></div>
                </div>
                <table id="tableDir" >
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Direccion</th>
                    <th>Colonia</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th>Pais</th>
                    <th>C.P.</th>
                    <th>Long</th>
                    <th>Lat</th>
                    <th>Editar/<br>Eliminar</th>
                    <th>Status</th>
                    </tr>
                  </thead>
                </table>

              </div>



            </div>
             <div role="tabpanel" class="tab-pane fade" id="tab_galeria" aria-labelledby="galeria-tab">
              <div class="x_content">
                <table id="imgDataTable" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>name</th>
                      <th>description</th>
                      <th>ubication</th>
                      <th>user_id</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id</th>
                      <th>name</th>
                      <th>description</th>
                      <th>ubication</th>
                      <th>user_id</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
<script type="text/javascript">
 $(document).ready(function() {
  var id=$('body').attr('data-iduser');
  $("#profileImage").fileinput({
    uploadUrl: "uploadAjax.php", 
    uploadAsync: false,
    minFileCount: 1,
    maxFileCount: 20,
    showUpload: false,
    uploadExtraData: {
        iduser: id,
    },
    showRemove: false,
    initialPreview: [
    <?php foreach($images as $image){?>
      "<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
      <?php } ?>],
      initialPreviewConfig: [<?php foreach($images as $image){ $infoImagenes=explode("/",$image);?>
      {caption: "<?php echo $infoImagenes[1];?>",  height: "120px", url: "borrarAjax.php", key:"<?php echo $infoImagenes[1];?>"},
      <?php } ?>]
    }).on("filebatchselected", function(event, files) {

      $("#profileImage").fileinput("upload");

    });
  });

</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBPc0IqUH5Kc7aTNQlfMDXEcJFVglGC9DI" async defer></script>
<script type="text/javascript">

  function crearTabla(){
   var table= $("#tableDir").DataTable({
          "iDisplayLength":100,
          "processing":true,
          "serverSide":true,
           "defaultContent": "-",
            "targets": "_all",
      ajax:{
      type: "POST",
     //url:'../classes/controller/socTable.php',
     url:'../classes/ajaxPosts.php',
      data: { tableDir:'1'},
      dataType: "json",
      },  
       "columnDefs":[
                 /* {
                    "targets" : [0],
                  "render": function(data,type,full){
                      

                  }

                  },   */  
                
                {
                  "targets" : [9],
                  "render": function(data,type,full){
                    return '<i id="update_'+full[0]+'" class="fa fa-pencil-square-o" aria-hidden="true"></i><i id="delete_'+full[0]+'" class="fa fa-times" aria-hidden="true"></i>'
                  }
                },
                  {
                    "targets" : [10],
                  "render": function(data,type,full){
                      if(data == 1){
                        return 'Activo';
                      }else{
                        return 'Inactivo';
                      }

                  }
                }
                
              ],
          "sDom":'ltrip',
          "initComplete": function(settings, json) {
              }
    });


   /*$('#tableDir').DataTable({
    ajax:{
      type:"POST",
      url:'../classes/ajaxPost.php',
      data: { tableDir:'1'}
     },
    columns: [  ]

   });*/
/*
          var table = $('#socTabla').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
          },
          "iDisplayLength":100,
          "processing":true,
          "serverSide":true,
          //"scrollY": 500,
          //"scrollX": true,
          "ajax":{
              data:{},
              type:  'post',
              url: '../classes/controller/socTable.php'
          },
          "columnDefs":[
                {
                  "targets" : [5],
                  "render": function(data,type,full){
                      if(data == 1){
                        return 'Activo';
                      }else{
                        return 'Inactivo';
                      }

                  }
                }
              ],
          "sDom":'ltrip',
          "initComplete": function(settings, json) {
              }
            });
*/

  }
</script>