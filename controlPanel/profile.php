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
      <div class="z-panel z-forceBlock bgTransparent wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
        <div class="z-panelBody z-block overflowHidden noPadding">
          <div class="z-block h100">
            <div class="z-content z-contentMiddle">
              <form id="editProfileF" class="form-section "  action="editPpicture.php" method="post" enctype="multipart/form-data">
                <h3 class="noMargin text-uppercase text-bold text-uppercase s20">Datos de Perfil</h3>
                <div class="hidden">
                  <?php
                  $result = user::getProfile($_SESSION['iduser']);
                  echo json_encode($result);
                  ?>
                </div>
                <label for="nameP"></label>
                <input id="nameP" type="text" class="form-control" placeholder="Nombre completo" name="nameP" value="<?php echo $result[0]['name'] ?>" required>
                <div class="clear"></div>
                <label for="phoneP"></label>
                <input id="phoneP" type="text" class="form-control" placeholder="Telefono" name="phoneP" value="<?php echo $result[0]['number'] ?>" required>

                <div class="clear"></div>
                <label for="emailP"></label>
                <input id="emailP" type="text" class="form-control" placeholder="E-mail" name="emailP" value="<?php echo $result[0]['mail'] ?>" required>

                <div class="clear"></div>
                <div class="form-section">
                  <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" name="fileToUpload">
                </div>
                <div class="clear"></div>
                <button type="button" id="editProfile" class="z-btn bgGreen cWhite text-center noTransform boxShadow" >
                  Editar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
