<?php
include ('header.php');

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>
<div id="solicitudes" class="right_col" role="main">
  <div class="z-row">
    <div class="z-col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Solicitudes<br>
        </header>
        <div class="panel-body table-responsive">
          <table id="socTabla" class="table table-hover">
            <thead>
              <tr>
                <th>Mail</th>
                <th>Contacto</th>
                <th>Telefono</th>
                <th>Negocio</th>
                <th>Password</th>
                <!-- <th>Rol</th> -->
                <!-- <th>Estatus</th> -->
                <th>Tipo de registro</th>
                <!-- <th>Activacion</th> -->
              </tr>
            </thead>
            <tbody>
            <?php
            $socios = user::getRegSoc();

            foreach ($socios as $key => $value) {

              $socios[$key]['active'] = ($socios[$key]['active'] == 0)? 'Inactivo' : 'activo';

              $row = '<tr>'.
                '<td>'.$socios[$key]['username'].'</td>'.
                '<td>'.$socios[$key]['name'].'</td>'.
                '<td>'.$socios[$key]['number'].'</td>'.
                '<td>'.$socios[$key]['negocio'].'</td>'.
                '<td>'.$socios[$key]['pass'].'</td>'.
                // '<td>'.$socios[$key]['role'].'</td>'.
                // '<td>'.$socios[$key]['active'].'</td>'.
                '<td>'.$socios[$key]['reg_type'].'</td>'.
                //'<td><form class="ActiveSoc" action="activateuser.php" method="post"><input type="hidden" value="'.$socios[$key]['username'].'" name="usuario"><button class="activeBtn"  type="button" >Activar</button></form></td>'.
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
