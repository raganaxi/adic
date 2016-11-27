<!--sidemenu-->
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title">
        <img src="../images/logos/logo.png" alt="..." class="h60 z-block centered">
        <!-- <i class="fa fa-code"></i> <span>asd</span> -->
      </a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="../images/profile/01.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenido,</span>
        <h2><?php
        if(isset($_SESSION['user'])) {
          echo $_SESSION['user'];
        } else {
          echo "no";
        }
         ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <div class="clear h10"></div>

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Acciones</h3>
        <ul class="nav side-menu">
          <li>
            <a href="publicacion.php"><i class="fa fa-dollar"></i> Crear Promocion</a>
          </li>
          <li>
            <a href="event.php"><i class="fa fa-calendar-check-o"></i> Crear Evento</a>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Reportes</h3>
        <ul class="nav side-menu">
          <li>
            <a href="index.php"><i class="fa fa-bar-chart"></i> Tipo Reporte 1</a>
          </li>
          <li>
            <a href="index.php"><i class="fa fa-th-list"></i> Tipo Reporte 2</a>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Configuración</h3>
        <ul class="nav side-menu">
          <li>
            <a href="profile.php"><i class="fa fa-users"></i> Cuenta</a>
          </li>
          <li>
            <a href="pagos.php"><i class="fa fa-credit-card"></i> Pagos</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" id="logOutbtn">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
<!--/sidemenu-->
