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
</style>    
<div id="perfil_socio" class="right_col" role="main" onload="initMap()">
  <div class="z-row">
    <div class="col-xs-12">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <div class="x_panel">
          <div class="x_title">
            <ul id="myTab" class="nav nav-tabs " role="tablist">
              <li role="presentation" class="active"><a href="#tab_datos" id="datos-tab" role="tab" data-toggle="tab" aria-expanded="true">Perfil y Contacto</a>
              </li>
              <li role="presentation" class=""><a href="#tab_imagenPerfil" role="tab" id="imagenPerfil-tab" data-toggle="tab" aria-expanded="false">Imagen de Perfil</a>
              </li>
              <li role="presentation" class=""><a href="#tab_direcciones" role="tab" id="direcciones-tab" data-toggle="tab" aria-expanded="false">Direcciones</a>
              </li>
              <li role="presentation" class=""><a href="#tab_acceso" role="tab" id="acceso-tab" data-toggle="tab" aria-expanded="false">Cuenta</a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_datos" aria-labelledby="datos-tab">
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
            <div role="tabpanel" class="tab-pane fade" id="tab_imagenPerfil" aria-labelledby="imagenPerfil-tab">
              <div class="x_content">
                <form class="" action="">
                  <div class="form-section">
                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" name="fileToUpload">
                  </div>
                </form>
                <button type="button" id="editProfilePic" class="btn bgGreen cWhite pull-right" >
                  Editar
                </button>
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
                    <th>Eliminar</th>
                    <th></th>
                    </tr>
                  </thead>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBPc0IqUH5Kc7aTNQlfMDXEcJFVglGC9DI" async defer></script>
<script type="text/javascript">

  function crearTabla(){
   var table= $("#tableDir").DataTable({
                "iDisplayLength":100,
          "processing":true,
          "serverSide":true,
      ajax:{
      type: "POST",
      url:'../classes/ajaxPosts.php',
      data: { tableDir:'1'},
        dataType: "json",
      },  
                "columnDefs":[
                {    "defaultContent": "-",
                     "targets": "_all",
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
  /* $.ajax({
      type:"POST",
      url:'../old/classes/ajaxPost.php',
      data: { tableDir:'1'},
      dataType: 'json',
      success: function (data){
        if (data.success) {
           $.each(data, function(index,record){
              if ($.isNumeric(index)) {
                var row=$("<tr />");
                $("<td />").text(record. ).appendTo(row);
              }
           });
        }


      }
   }); */


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