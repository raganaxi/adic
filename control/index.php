<?php include ('header.php'); ?>
  <main class="z-container-fluid noPadding hFull bgBlue">
    <div class="bgCover"></div>
    <div class="z-container">
      <div class="z-row">
        <div class="z-col-lg-6 z-col-md-6 z-col-sm-8 z-col-xs-12 z-col-lg-offset-3 z-col-md-offset-3 z-col-sm-offset-2 z-col-xs-offset-0">
          <div class="hFull z-block">
            <div class="z-content z-contentMiddle">
              <div class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="z-forceBlock text-center">
                  <img src="../images/logos/logo.png" class=" h60"/>
                  <h1 class="cLightGrey text-center s35">Bienvenido Socio</h1>
                  <p class="cLightGrey">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                </div>
              </div>
              <div class="clear h20"></div>
              <hr>
              <div class="clear h20"></div>
              <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
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
          <form id="loginSocio" class="form-section">
            <input Id="userSoc" type="text" class="form-control" placeholder="Usuario" name="user" value="">
            <div class="clear"></div>
            <input Id="passwSoc" type="password" class="form-control" placeholder="Contraseña" name="pass" value="">
            <div class="clear"></div>
            <button type="button" id="logSocio" href="dashboard.php" class="z-btn h50 bgDarkBlue cWhite s20 text-center noTransform boxShadow">
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
          <form id="registerSocio" class="form-section" action="uploadPicture.php" method="post" enctype="multipart/form-data">
            <input id="nameNegocio" type="text" class="form-control" placeholder="Nombre Negocio" name="nameBussiness" value="">
            <div class="clear"></div>
            <input id="nameSocio" type="text" class="form-control" placeholder="Nombre Representante" name="nameSocio" value="">
            <div class="clear"></div>
            <input id="telSocio" type="text" class="form-control" placeholder="Teléfono" name="telSocio" value="">
            <div class="clear"></div>
            <input id="addressSocio" type="text" class="form-control hidden" placeholder="Dirección" name="addressSocio" value="" disabled>
            <div class="clear hidden"></div>
            <input id="mailSocio" type="text" class="form-control" placeholder="Correo" name="mailSocio" value="">
            <div class="clear"></div>
            <input id="passwSocio" type="password" class="form-control hidden" placeholder="Contraseña" name="passwSocio" value="">
            <div class="clear hidden"></div>
            <input type="file" id="imgProfile" name="imgProfile" class="form-control hidden" accept="image/*">
            <div class="clear hidden"></div>
            <button type="button" id="createSoc" class="z-btn h50 bgDarkBlue cWhite s20 text-center noTransform boxShadow">
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
