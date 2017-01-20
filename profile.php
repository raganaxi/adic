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
<div id="perfil_socio" class="right_col" role="main" onload="initMap()">
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
              <li role="presentation" class=""><a href="#tab_galeria" role="tab" id="acceso-tab" data-toggle="tab" aria-expanded="false">Galeria de Imagenes </a>

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
            <div role="tabpanel" class="tab-pane fade" id="tab_galeria" aria-labelledby="galeria-tab">
              <div class="x_content">
                <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                    </tr>
                    <tr>
                      <td>Herrod Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012/08/06</td>
                      <td>$137,500</td>
                    </tr>
                    <tr>
                      <td>Rhona Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                    </tr>
                    <tr>
                      <td>Colleen Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009/09/15</td>
                      <td>$205,500</td>
                    </tr>
                    <tr>
                      <td>Sonya Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>23</td>
                      <td>2008/12/13</td>
                      <td>$103,600</td>
                    </tr>
                    <tr>
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                    </tr>
                    <tr>
                      <td>Quinn Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2013/03/03</td>
                      <td>$342,000</td>
                    </tr>
                    <tr>
                      <td>Charde Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>36</td>
                      <td>2008/10/16</td>
                      <td>$470,600</td>
                    </tr>
                    <tr>
                      <td>Haley Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>43</td>
                      <td>2012/12/18</td>
                      <td>$313,500</td>
                    </tr>
                    <tr>
                      <td>Tatyana Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>19</td>
                      <td>2010/03/17</td>
                      <td>$385,750</td>
                    </tr>
                    <tr>
                      <td>Michael Silva</td>
                      <td>Marketing Designer</td>
                      <td>London</td>
                      <td>66</td>
                      <td>2012/11/27</td>
                      <td>$198,500</td>
                    </tr>
                    <tr>
                      <td>Paul Byrd</td>
                      <td>Chief Financial Officer (CFO)</td>
                      <td>New York</td>
                      <td>64</td>
                      <td>2010/06/09</td>
                      <td>$725,000</td>
                    </tr>
                    <tr>
                      <td>Gloria Little</td>
                      <td>Systems Administrator</td>
                      <td>New York</td>
                      <td>59</td>
                      <td>2009/04/10</td>
                      <td>$237,500</td>
                    </tr>
                    <tr>
                      <td>Bradley Greer</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td>41</td>
                      <td>2012/10/13</td>
                      <td>$132,000</td>
                    </tr>
                    <tr>
                      <td>Dai Rios</td>
                      <td>Personnel Lead</td>
                      <td>Edinburgh</td>
                      <td>35</td>
                      <td>2012/09/26</td>
                      <td>$217,500</td>
                    </tr>
                    <tr>
                      <td>Jenette Caldwell</td>
                      <td>Development Lead</td>
                      <td>New York</td>
                      <td>30</td>
                      <td>2011/09/03</td>
                      <td>$345,000</td>
                    </tr>
                    <tr>
                      <td>Yuri Berry</td>
                      <td>Chief Marketing Officer (CMO)</td>
                      <td>New York</td>
                      <td>40</td>
                      <td>2009/06/25</td>
                      <td>$675,000</td>
                    </tr>
                    <tr>
                      <td>Caesar Vance</td>
                      <td>Pre-Sales Support</td>
                      <td>New York</td>
                      <td>21</td>
                      <td>2011/12/12</td>
                      <td>$106,450</td>
                    </tr>
                    <tr>
                      <td>Doris Wilder</td>
                      <td>Sales Assistant</td>
                      <td>Sidney</td>
                      <td>23</td>
                      <td>2010/09/20</td>
                      <td>$85,600</td>
                    </tr>
                    <tr>
                      <td>Angelica Ramos</td>
                      <td>Chief Executive Officer (CEO)</td>
                      <td>London</td>
                      <td>47</td>
                      <td>2009/10/09</td>
                      <td>$1,200,000</td>
                    </tr>
                    <tr>
                      <td>Gavin Joyce</td>
                      <td>Developer</td>
                      <td>Edinburgh</td>
                      <td>42</td>
                      <td>2010/12/22</td>
                      <td>$92,575</td>
                    </tr>
                    <tr>
                      <td>Jennifer Chang</td>
                      <td>Regional Director</td>
                      <td>Singapore</td>
                      <td>28</td>
                      <td>2010/11/14</td>
                      <td>$357,650</td>
                    </tr>
                    <tr>
                      <td>Brenden Wagner</td>
                      <td>Software Engineer</td>
                      <td>San Francisco</td>
                      <td>28</td>
                      <td>2011/06/07</td>
                      <td>$206,850</td>
                    </tr>
                    <tr>
                      <td>Fiona Green</td>
                      <td>Chief Operating Officer (COO)</td>
                      <td>San Francisco</td>
                      <td>48</td>
                      <td>2010/03/11</td>
                      <td>$850,000</td>
                    </tr>
                    <tr>
                      <td>Shou Itou</td>
                      <td>Regional Marketing</td>
                      <td>Tokyo</td>
                      <td>20</td>
                      <td>2011/08/14</td>
                      <td>$163,000</td>
                    </tr>
                    <tr>
                      <td>Michelle House</td>
                      <td>Integration Specialist</td>
                      <td>Sidney</td>
                      <td>37</td>
                      <td>2011/06/02</td>
                      <td>$95,400</td>
                    </tr>
                    <tr>
                      <td>Suki Burks</td>
                      <td>Developer</td>
                      <td>London</td>
                      <td>53</td>
                      <td>2009/10/22</td>
                      <td>$114,500</td>
                    </tr>
                    <tr>
                      <td>Prescott Bartlett</td>
                      <td>Technical Author</td>
                      <td>London</td>
                      <td>27</td>
                      <td>2011/05/07</td>
                      <td>$145,000</td>
                    </tr>
                    <tr>
                      <td>Gavin Cortez</td>
                      <td>Team Leader</td>
                      <td>San Francisco</td>
                      <td>22</td>
                      <td>2008/10/26</td>
                      <td>$235,500</td>
                    </tr>
                    <tr>
                      <td>Martena Mccray</td>
                      <td>Post-Sales support</td>
                      <td>Edinburgh</td>
                      <td>46</td>
                      <td>2011/03/09</td>
                      <td>$324,050</td>
                    </tr>
                    <tr>
                      <td>Unity Butler</td>
                      <td>Marketing Designer</td>
                      <td>San Francisco</td>
                      <td>47</td>
                      <td>2009/12/09</td>
                      <td>$85,675</td>
                    </tr>
                    <tr>
                      <td>Howard Hatfield</td>
                      <td>Office Manager</td>
                      <td>San Francisco</td>
                      <td>51</td>
                      <td>2008/12/16</td>
                      <td>$164,500</td>
                    </tr>
                    <tr>
                      <td>Hope Fuentes</td>
                      <td>Secretary</td>
                      <td>San Francisco</td>
                      <td>41</td>
                      <td>2010/02/12</td>
                      <td>$109,850</td>
                    </tr>
                    <tr>
                      <td>Vivian Harrell</td>
                      <td>Financial Controller</td>
                      <td>San Francisco</td>
                      <td>62</td>
                      <td>2009/02/14</td>
                      <td>$452,500</td>
                    </tr>
                    <tr>
                      <td>Timothy Mooney</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>37</td>
                      <td>2008/12/11</td>
                      <td>$136,200</td>
                    </tr>
                    <tr>
                      <td>Jackson Bradshaw</td>
                      <td>Director</td>
                      <td>New York</td>
                      <td>65</td>
                      <td>2008/09/26</td>
                      <td>$645,750</td>
                    </tr>
                    <tr>
                      <td>Olivia Liang</td>
                      <td>Support Engineer</td>
                      <td>Singapore</td>
                      <td>64</td>
                      <td>2011/02/03</td>
                      <td>$234,500</td>
                    </tr>
                    <tr>
                      <td>Bruno Nash</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td>38</td>
                      <td>2011/05/03</td>
                      <td>$163,500</td>
                    </tr>
                    <tr>
                      <td>Sakura Yamamoto</td>
                      <td>Support Engineer</td>
                      <td>Tokyo</td>
                      <td>37</td>
                      <td>2009/08/19</td>
                      <td>$139,575</td>
                    </tr>
                    <tr>
                      <td>Thor Walton</td>
                      <td>Developer</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2013/08/11</td>
                      <td>$98,540</td>
                    </tr>
                    <tr>
                      <td>Finn Camacho</td>
                      <td>Support Engineer</td>
                      <td>San Francisco</td>
                      <td>47</td>
                      <td>2009/07/07</td>
                      <td>$87,500</td>
                    </tr>
                    <tr>
                      <td>Serge Baldwin</td>
                      <td>Data Coordinator</td>
                      <td>Singapore</td>
                      <td>64</td>
                      <td>2012/04/09</td>
                      <td>$138,575</td>
                    </tr>
                    <tr>
                      <td>Zenaida Frank</td>
                      <td>Software Engineer</td>
                      <td>New York</td>
                      <td>63</td>
                      <td>2010/01/04</td>
                      <td>$125,250</td>
                    </tr>
                    <tr>
                      <td>Zorita Serrano</td>
                      <td>Software Engineer</td>
                      <td>San Francisco</td>
                      <td>56</td>
                      <td>2012/06/01</td>
                      <td>$115,000</td>
                    </tr>
                    <tr>
                      <td>Jennifer Acosta</td>
                      <td>Junior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>43</td>
                      <td>2013/02/01</td>
                      <td>$75,650</td>
                    </tr>
                    <tr>
                      <td>Cara Stevens</td>
                      <td>Sales Assistant</td>
                      <td>New York</td>
                      <td>46</td>
                      <td>2011/12/06</td>
                      <td>$145,600</td>
                    </tr>
                    <tr>
                      <td>Hermione Butler</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>47</td>
                      <td>2011/03/21</td>
                      <td>$356,250</td>
                    </tr>
                    <tr>
                      <td>Lael Greer</td>
                      <td>Systems Administrator</td>
                      <td>London</td>
                      <td>21</td>
                      <td>2009/02/27</td>
                      <td>$103,500</td>
                    </tr>
                    <tr>
                      <td>Jonas Alexander</td>
                      <td>Developer</td>
                      <td>San Francisco</td>
                      <td>30</td>
                      <td>2010/07/14</td>
                      <td>$86,500</td>
                    </tr>
                    <tr>
                      <td>Shad Decker</td>
                      <td>Regional Director</td>
                      <td>Edinburgh</td>
                      <td>51</td>
                      <td>2008/11/13</td>
                      <td>$183,000</td>
                    </tr>
                    <tr>
                      <td>Michael Bruce</td>
                      <td>Javascript Developer</td>
                      <td>Singapore</td>
                      <td>29</td>
                      <td>2011/06/27</td>
                      <td>$183,000</td>
                    </tr>
                    <tr>
                      <td>Donna Snider</td>
                      <td>Customer Support</td>
                      <td>New York</td>
                      <td>27</td>
                      <td>2011/01/25</td>
                      <td>$112,000</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_direcciones" aria-labelledby="datos-tab">
              <div class="x_content">
                <form id="editProfileF"><!--action="editPpicture.php" method="post" enctype="multipart/form-data"-->
                  <div class="form-section">
                    <label for="calleDir">Dirección</label><input id="calleDir" type="text" class="form-control geo1" placeholder="Calle y numero" name="calleDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="numeroDir">Colonia</label>
                    <input id="coloniaDir" type="text" class="form-control geo2" placeholder="Número" name="numeroDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="municipioDir">Municipio</label>
                    <input id="municipioDir" type="text" class="form-control geo3" placeholder="Municipio" name="municipioDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="estadoDir">Estado</label>
                    <input id="estadoDir" type="text" class="form-control geo4" placeholder="Estado" name="estadoDir" value="" required>
                    <div class="clear"></div>
                  </div>
                  <div class="form-section">
                    <label for="paisDir">País</label>
                    <input id="paisDir" type="text" class="form-control geo5" placeholder="País" name="paisDir" value="" required>
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
                   <div id="mapDir" style="width: 100%; height: 350px;" ></div>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBPc0IqUH5Kc7aTNQlfMDXEcJFVglGC9DI" async defer></script>


