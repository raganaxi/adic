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
<div id="perfil_socio" class="right_col" role="main">
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
                <form id="editProfileF"><!--action="editPpicture.php" method="post" enctype="multipart/form-data"-->
                  <div class="form-section">
                    <label for="calleDir">Calle</label>
                    <input id="calleDir" type="text" class="form-control" placeholder="Calle" name="calleDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="numeroDir">Número</label>
                    <input id="numeroDir" type="text" class="form-control" placeholder="Número" name="numeroDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="municipioDir">Municipio</label>
                    <input id="municipioDir" type="text" class="form-control" placeholder="Municipio" name="municipioDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="estadoDir">Estado</label>
                    <input id="estadoDir" type="text" class="form-control" placeholder="Estado" name="estadoDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="paisDir">País</label>
                    <input id="paisDir" type="text" class="form-control" placeholder="País" name="paisDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="cpDir">Código Postal</label>
                    <input id="cpDir" type="text" class="form-control" placeholder="CP" name="cpDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="latDir">Latitud</label>
                    <input id="latDir" type="text" class="form-control" placeholder="Latitud" name="latDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="lonDir">Longitud</label>
                    <input id="lonDir" type="text" class="form-control" placeholder="Longitud" name="lonDir" value="" required>
                    <div class="clear"></div>
                  </div>
                     <div id="mapa">
                            <div class="map_vermapa">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11430.395500596715!2d-103.40921931203525!3d25.526749232901167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1458071643914" width="290px" height="190px" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <script>
function iniciar() {
var mapOptions = {
center: new google.maps.LatLng(25.80, -80.30),
zoom: 10,
mapTypeId: google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("map"),mapOptions);}              
</script>

<div id="map" style="width: 100px; height: 100px"></div>
                  <button type="button" id="saveDireccion" class="btn bgGreen cWhite pull-right" >
                    Guardar Dirección
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDvWxBhx1mc5MB2rnNQzMn4Z7xrGjVBtpQ&callback=iniciar">
</script>
