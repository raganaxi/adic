<!doctype html>
<html class="no-js" lang="en-US">
<head>
  <meta charset="utf-8">

  <title>A donde ir en la ciudad</title>

  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="theme-color" content="#385e9d" />
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <!-- Standard Favicon -->
  <link rel="icon" sizes="32x32" type="image/x-icon" href="favicon/favicon.ico" />
  <!-- For iPhone 4 Retina display: -->
  <!--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon/apple-touch-icon-114x114-precomposed.png">-->
  <!-- For iPad: -->
  <!--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon/apple-touch-icon-72x72-precomposed.png">-->
  <!-- For iPhone: -->
  <!--<link rel="apple-touch-icon-precomposed" href="favicon/apple-touch-icon-57x57-precomposed.png">-->
  <!-- For Windows 8: -->
  <!--<meta name="msapplication-TileImage" content="favicon/pinned.png">
  <meta name="msapplication-TileColor" content="#385e9d">-->
  <!-- For Opera Coast: -->
  <!--<link rel="icon" sizes="228x228" href="favicon/favicon-coast.png" >-->

  <!-- build:css css/styles.css -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="bower_components/slidebars/dist/slidebars.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/helpers.css">

  <!-- endbuild -->

</head>
<body class="bgLightGrey hFull">

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
                Inicia sesión
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
            <input type="text" class="form-control" placeholder="Usuario" name="user" value="">
            <div class="clear"></div>
            <input type="text" class="form-control" placeholder="Contraseña" name="pass" value="">
            <div class="clear"></div>
            <button href="#" class="z-btn h50 btn-rounded bgGreen cWhite s20 text-center noTransform boxShadow">
              Iniciar Sesión
            </button>
          </form>
          <hr>
          <div class="form-section">
            <a href="main.html" class="z-btn btn-rounded h50 bgBlue cWhite s20 text-center noTransform boxShadow">
              Facebook
            </a>
            <div class="clear"></div>
            <a href="main.html" class="z-btn btn-rounded h50 bgRed cWhite s20 text-center noTransform boxShadow">
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
            <input type="text" class="form-control" placeholder="Correo" name="mail" value="">
            <div class="clear"></div>
            <input type="password" class="form-control" placeholder="Contraseña" name="password" value="">
            <div class="clear"></div>
            <button href="#" class="z-btn btn-rounded h50 bgGreen cWhite s20 text-center noTransform boxShadow">
              Crear cuenta
            </button>
          </form>
          <hr>
          <div class="form-section">
            <a href="main.html" class="z-btn btn-rounded h50 bgBlue cWhite s20 text-center noTransform boxShadow">
              Facebook
            </a>
            <div class="clear"></div>
            <a href="main.html" class="z-btn btn-rounded h50 bgRed cWhite s20 text-center noTransform boxShadow">
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

  <script src="bower_components/jquery/dist/jquery.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
  <script src="bower_components/slidebars/dist/slidebars.min.js"></script>
  <script src="js/jquery.touchSwipe.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
