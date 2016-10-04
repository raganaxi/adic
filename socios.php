<?php include ('header.php'); ?>
  <main class="z-container-fluid noPadding hFull bgBlue">
    <div class="bgCover"></div>
    <div class="z-container">
      <div class="hFull z-block">
        <div class="z-content z-contentMiddle">
          <div class="z-row">
            <div class="z-col-lg-12">
              <!--<img src="images/logos/logo.png" class="centered z-forceBlock wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s" />-->
              <!--<h2 class="text-center cLightBlue s35 noMargin text-bold text-shadow wow fadeInDown" data-wow-duration="1s" data-wow-delay=".8s">
                en la ciudad
              </h2>-->
            </div>
          </div>
          <!--<div class="clear h100"></div>-->
          <div class="z-row wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
            <div class="z-col-xs-12">
              <div class="z-forceBlock text-center">
                <img src="images/logos/logo.png" class=" h60"/>
              </div>
              <h1 class="cLightGrey text-center s35">Bienvenido Socio</h1>
              <p class="cLightGrey">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
          <div class="clear h50"></div>
          <div class="z-row wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
            <hr>
            <div class="z-col-lg-4 z-col-lg-offset-2 z-col-md-4 z-col-md-offset-2 z-col-sm-4 z-col-sm-offset-2 z-col-xs-8 z-col-xs-offset-2">
              <a href="main.html" class="z-block h50 cLightGrey s20 text-center noTransform text-uppercase" data-toggle="modal" data-target="#loginModal">
                <div class="z-content z-contentMiddle">
                  Inicia sesión
                </div>
              </a>
              <a href="main.html" class="z-block h50 cLightGrey s20 text-center noTransform text-uppercase" data-toggle="modal" data-target="#regModal">
                <div class="z-content z-contentMiddle">
                  Crea una cuenta
                </div>
              </a>
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
            <input type="text" class="form-control" placeholder="Usuario" name="user" value="">
            <div class="clear"></div>
            <input type="text" class="form-control" placeholder="Contraseña" name="pass" value="">
            <div class="clear"></div>
            <button href="profile.php" class="z-btn h50 bgDarkBlue cWhite s20 text-center noTransform boxShadow">
              Iniciar Sesión
            </button>
          </form>
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
            <input type="text" class="form-control" placeholder="Nombre" name="nameSocio" value="">
            <div class="clear"></div>
            <input type="text" class="form-control" placeholder="Telefono" name="phoneSocio" value="">
            <div class="clear"></div>
            <input type="text" class="form-control" placeholder="Dirección" name="addressSocio" value="">
            <div class="clear"></div>
            <input type="text" class="form-control" placeholder="Correo" name="mail" value="">
            <div class="clear"></div>
            <input type="password" class="form-control" placeholder="Contraseña" name="password" value="">
            <div class="clear"></div>
            <button href="profile.php" class="z-btn h50 bgDarkBlue cWhite s20 text-center noTransform boxShadow">
              Crear cuenta
            </button>
          </form>
        </div>
        <!--<div class="modal-footer">
          <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>-->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<?php include ('footer.php'); ?>
