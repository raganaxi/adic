<?php
include ('header.php');

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>
<div id="solicitudes" class="right_col" role="main">
  <div class="z-row">
    <div class="z-col-lg-12">
      <section class="x_panel">
        <div class="x_title">
          <h2>Registrar usuario</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form id="registerSocio-admin" enctype="multipart/form-data" method="post">
            <h1>Crear Cuenta</h1>
            <div>
              <input id="nameNegocio" type="text" class="form-control" placeholder="Nombre Negocio" name="nameBussiness" value="">
            </div>
            <div>
              <input id="nameSocio" type="text" class="form-control" placeholder="Nombre Representante" name="nameSocio" value="">
            </div>
            <div>
              <input id="telSocio" type="text" class="form-control" placeholder="Teléfono" name="telSocio" value="">
            </div>
            <div>
              <input id="mailSocio" type="text" class="form-control" placeholder="Correo" name="mailSocio" value="">
            </div>
            <div class="clear"></div>
            <div>
              <button type="button" id="createSoc" class="btn bgGreen cWhite s20 text-center noTransform boxShadow">
                Crear cuenta
              </button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
