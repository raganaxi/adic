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
          <h2>Solicitudes</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="socTabla" class="table table-hover">
            <thead>
              <tr>
                <th>Mail</th>
                <th>Contacto</th>
                <th>Telefono</th>
                <th>Negocio</th>
                <th>Password</th>
                <!-- <th>Rol</th> -->
                <th>Estatus</th>
                <!-- <th>Tipo de registro</th> -->
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $socios = user::getStanbySoc();

              foreach ($socios as $key => $value) {

                $socios[$key]['active'] = ($socios[$key]['active'] == 0)? 'Inactivo' : 'activo';

                $row = '<tr>'.
                  '<td>'.$socios[$key]['username'].'</td>'.
                  '<td>'.$socios[$key]['name'].'</td>'.
                  '<td>'.$socios[$key]['number'].'</td>'.
                  '<td>'.$socios[$key]['negocio'].'</td>'.
                  '<td>'.$socios[$key]['pass'].'</td>'.
                  // '<td>'.$socios[$key]['role'].'</td>'.
                  '<td>'.$socios[$key]['active'].'</td>'.
                  // '<td>'.$socios[$key]['reg_type'].'</td>'.
                  '<td>
                    <input class="iduser" type="hidden" value="'.$socios[$key]['iduser'].'" name="iduser">
                    <button class="activeBtn" type="button" >Activar</button>
                  </td>'.
                '</tr>';
                echo $row;
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
