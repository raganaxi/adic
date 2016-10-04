<?php 
include ('header.php');
//autoloader para cargar clases
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

?>

  <main class="z-container-fluid splash noPadding hFull">

    <div class="bgCover"></div>
    <div class="z-container">
      <div class="hFull z-block">
        <div class="z-content z-contentMiddle">
          <div class="z-row">
            <div class="z-col-lg-12">
              <img src="images/logos/logo.png" class="centered z-forceBlock wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s" />
              <!--<h2 class="text-center cLightBlue s35 noMargin text-bold text-shadow wow fadeInDown" data-wow-duration="1s" data-wow-delay=".8s">
                en la ciudad
              </h2>-->
            </div>
          </div>
          <div class="clear h100"></div>
          <div class="z-row wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
            <div class="z-col-xs-12">
              <h1 class="cWhite text-center s25">Bienvenido</h1>
            </div>
            <div class="z-col-lg-4 z-col-lg-offset-2 z-col-md-4 z-col-md-offset-2 z-col-sm-4 z-col-sm-offset-2 z-col-xs-8 z-col-xs-offset-2">
              <a href="main.html" class="z-btn h50 btn-rounded bgGreen cWhite s20 text-center noTransform boxShadow" data-toggle="modal" data-target="#loginModal">
                Inicia sesión<br>
              </a>
              <div class="clear"></div>
            </div>
            <div class="z-col-lg-4 z-col-md-4 z-col-sm-4 z-col-sm-offset-0 z-col-xs-8 z-col-xs-offset-2">
              <a href="main.html" class="z-btn btn-rounded h50 bgLightBlue cWhite s20 text-center noTransform boxShadow" data-toggle="modal" data-target="#regModal">
                Crea una cuenta
              </a>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <div class="modal fade bgDarkClear" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ingresa</h4>
        </div>
        <div class="modal-body">
          <form class="form-section">
            <input id="logUser" type="text" class="form-control" placeholder="Usuario" name="user" value="">
            <div class="clear"></div>
            <input id="logPass" type="text" class="form-control" placeholder="Contraseña" name="pass" value="">
            <div class="clear"></div>
            <button type="button" id="loginU"  class="z-btn h50 btn-rounded bgGreen cWhite s20 text-center noTransform boxShadow">
              Iniciar Sesión
            </button>
          </form>
          <hr>
          <div class="form-section">
            <a href="main.php" class="z-btn btn-rounded h50 bgBlue cWhite s20 text-center noTransform boxShadow">
              Facebook
            </a>
            <div class="clear"></div>
            <a href="main.php" class="z-btn btn-rounded h50 bgRed cWhite s20 text-center noTransform boxShadow">
              Google+
            </a>
          </div>
        </div>
        <!--<div class="modal-footer">
          <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>-->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <div class="modal fade bgDarkClear" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Registrate</h4>
        </div>
        <div class="modal-body">
          <form class="form-section">
            <input id="ruMail" type="text" class="form-control" placeholder="Correo" name="mail" value="">
            <div class="clear"></div>
            <input id="ruPass" type="password" class="form-control" placeholder="Contraseña" name="password" value="">
            <div class="clear"></div>
            <button type="button" id="crteAccountE" class="z-btn btn-rounded h50 bgGreen cWhite s20 text-center noTransform boxShadow">
              Crear cuenta
            </button>
          </form>
          <hr>
          <div class="form-section">
            <a href="main.php" class="z-btn btn-rounded h50 bgBlue cWhite s20 text-center noTransform boxShadow">
              Facebook
            </a>
            <div class="clear"></div>
            <a href="main.<?php  ?>" class="z-btn btn-rounded h50 bgRed cWhite s20 text-center noTransform boxShadow">
              Google+
            </a>
          </div>
        </div>
        <!--<div class="modal-footer">
          <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>-->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<?php include ('footer.php'); ?>
