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
<script type="text/javascript">

  function formWizard(){
  $('.container').attr('style','display: none');
    swal.setDefaults({
 // input: 'text',
  confirmButtonText: 'Continuar &rarr;',
  //showCancelButton: true,
  animation: false,
  allowOutsideClick: false,
  progressSteps: ['1', '2', '3','4','5','6'],

})

var steps = [
  {
    title:"<i class='fa fa-user fa-5x' aria-hidden='true'></i><br>Bienvenido <?php echo $profile['0']['username'];?>!",
    text:'Comencemos con una configuracion rapida de tu perfil.' 
  },
  {
    title: 'Perfil y Contacto',
    html: '<form id="editProfileF"><div class="form-section"><label for="nameP">Nombre de contacto</label><input id="nameP" type="text" class="form-control" placeholder="Nombre completo" name="nameP" value="<?php echo $profile[0]['name'] ?>" required><div class="clear"></div></div><div class="form-section"><label for="phoneP">Telefono</label><input id="phoneP" type="text" class="form-control" placeholder="Telefono" name="phoneP" value="<?php echo $profile[0]['number'] ?>" required><div class="clear"></div></div><div class="form-section"><label for="emailP">Correo</label><input id="emailP" type="email" class="form-control" placeholder="E-mail" name="emailP" value="<?php echo $profile[0]['mail'] ?>" required><div class="clear"></div></div><div class="form-section"><label for="negocioP">Nombre del negocio</label><input id="negocioP" type="text" class="form-control" placeholder="Nombre" name="negocioP" value="<?php echo $profile[0]['negocio'] ?>" required><div class="clear"></div></div><button type="button" id="editProfile" class="btn bgGreen cWhite pull-right" >Guardar cambios</button></form><h4 style="color:blue;">Aqui podras corroborar y cambiar tus datos, ademas de añadir tus datos de contacto faltantes.</h4><h6 style="color:red;">Recuerda que esto es importante para mantenernos en contacto.<h6>'
  },
  {
    title:'Elige tu imagen de perfil',
    html:'<div role="tabpanel" class="tab-pane fade in " id="tab_imagenPerfil" aria-labelledby="imagenPerfil-tab"><div class="x_content"><?php 
    $directory = "../imagenes_/profPicture/".$_SESSION['iduser']."/";
    if (!file_exists($directory)) {
      mkdir($directory, 0777,true);
  }
  $db_con = new PDOMYSQL;
  $cosultaImages="SELECT img from user_data where user_id = ?";
  $parametros = array($_SESSION['iduser']);
  $result =  $db_con->consultaSegura($cosultaImages,$parametros);
  $image = "../imagenes_/profPicture/".$result[0]['img'];
  ?><h5>Imagen de Perfil </h5><hr><div class="file-preview-frame file-preview-initial file-sortable kv-preview-thumb" id="preview-1485101766037-init_0" data-fileindex="init_0" data-template="image"><div class="kv-file-content"><img id="previewProfileImage" src="<?php echo $image; ?>" height="120px" class="file-preview-image"></div></div><div class="clearfix"></div><form id="formProfileimage" class="form-section" enctype="multipart/form-data"><div class="clear"></div><label for="fileImage"><span type="span"  class="btn btn-info cWhite s20 text-center noTransform boxShadow pull-right" name="span">Buscar Imagen</span></label><div class="row"><div class="col-xs-12 col-sm-12 col-md-12"><input type="file" id="fileImage" name="fileImage" class="form-control" accept="image/*"></div></div><div class="clear"></div><button type="submit" id="fileUpload" class="btn btn-success cWhite s20 text-center noTransform boxShadow pull-right" name="button">Subir Imagen</button></form></div></div><h4 style="color:blue;">En esta seccion tu puedes elegir la imagen de perfil que mas te guste.</h4>' 
  },
  {
    title: 'Direcciones',
    html: '<form id="editProfileD" "><div class="form-section"><label for="calleDir">Dirección</label><input id="calleDir" type="text" class="form-control geo1" placeholder="Calle y numero" name="calleDir" value="" required><div class="clear"></div></div><div class="form-section"><label for="numeroDir">Colonia</label><input id="coloniaDir" type="text" class="form-control geo2" placeholder="Colonia" name="numeroDir" value="" required><div class="clear"></div></div><div class="form-section"><label for="municipioDir">Municipio</label><input id="municipioDir" type="text" class="form-control geo3" placeholder="Municipio" name="municipioDir" value="" required><div class="clear"></div></div><div class="form-section"><label for="estadoDir">Estado</label><input id="estadoDir" type="text" class="form-control geo4" placeholder="Estado" name="estadoDir" value="" required><div class="clear"></div></div><div class="form-section"><label for="paisDir">País</label><input id="paisDir" type="text" class="form-control geo5" placeholder="País" name="paisDir" value="" required><div class="clear"></div></div><div class="form-section"><label for="cpDir">Código Postal</label><input id="cpDir" type="text" class="form-control" placeholder="CP" name="cpDir" value="" required><div class="clear"></div></div><div class="form-section"><label for="latDir">Latitud</label><input id="latDir" type="text" class="form-control" placeholder="Latitud" name="latDir" value="" required><div class="clear"></div></div><div class="form-section"><label for="lonDir">Longitud</label><input id="lonDir" type="text" class="form-control" placeholder="Longitud" name="lonDir" value="" required><div class="clear"></div></div><div id="mapDir" style="width: 100%; height: 200px;" ></div></form><h4 style="color:blue;">Aqui puedes añadir una o mas direcciones de tu negocio.</h4><h6 style="color:red;">Verifica que el posicionamiento del mapa sea corecto, sera mas facil para tus clientes visitarte.<h6>'
  },
    {
    title:'Cuenta',
    html: '<div role="tabpanel" class="tab-pane " id="tab_acceso" aria-labelledby="acceso-tab"><div class="x_content"><form class="" action=""><div class="form-section"><label for="oldPassP">Contraseña Actual</label><input id="oldPassP" type="password" class="form-control" placeholder="" name="oldPassP" value=""><div class="clear"></div></div><div class="form-section"><label for="newPassP">Contraseña Nueva</label><input id="newPassP" type="password" class="form-control" placeholder="" name="newPassP" value="" required><div class="clear"></div></div><button type="button" id="changeAccess" class="btn bgGreen cWhite pull-right" >Guardar cambios</button></form></div></div><h4 style="color:blue;">Si lo deseas, aqui puedes cambiar tu contraseña por alguna que sea de tu agrado.</h4>'
  },
  {
   title: 'Galeria de Imagenes ',
   html:''
  }
 
]

swal.queue(steps).then(function (result) {
  $('.container').attr('style','display: block');
  if (steps[3]==steps) {initMap();}
  swal.resetDefaults()
  swal({
    title: '<div style="color: white;">Configuracion Finalizada!<div>',
    html:'<div class="z-block centered"><img src="../images/logos/logo.png" alt="..." class="h200" style="width: 100%;"></div><h4 style="color:#00cfff;">Te da la bienvenida!.</h4><h6 style="color:#fd3b4f;">Si deceas cambiar laguna configuracion de las anteriores, puedes ingresar a la seccion cuenta para modificar o añadir cualquier dato.<h6>',
      /*'Your answers: <pre>' +
        JSON.stringify(result) +
      '</pre>',*/
      customClass:'bgDarkBlue',
      allowOutsideClick: false,
    confirmButtonText: 'Fin',
    showCancelButton: false,
  }).then(function () {  
    $.ajax({
    data:{firstLog:1, idUs: '<?php echo $profile['0']['iduser'];?>' },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  }).done( function ( data ) {
    if ( data != 0 ) {
     console.log( 'primer login realizado!!!.' );
    }
    else {
      console.log( 'problemas al actualizar usuario' );
      console.log(data);
  }
    
  } );
})
}, function () {  
  swal.resetDefaults()
})

  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBPc0IqUH5Kc7aTNQlfMDXEcJFVglGC9DI" async defer></script>
<?php
if($_SESSION['rol'] == 'socio'&&$profile['0']['first_log']==0) {
  echo "<script>";
  echo "formWizard();";
  echo "</script>";
  }
?>
<script type="text/javascript">

</script>