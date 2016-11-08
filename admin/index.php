<?php include ('header.php'); ?>

<?php
if(isset($_SESSION['user'])){ ?>
  <!-- Main content -->
  <section class="content z-container-fluid">
    <div class="clear"></div>
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div id="accesos_directos" class="row" style="margin-bottom:5px;">
            <div class="col-md-3 col-xs-6">
              <div class="sm-st clearfix">
                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                <div class="sm-st-info">
                  <span>3200</span> Total Tasks
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-6">
              <div class="sm-st clearfix">
                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                <div class="sm-st-info">
                  <span>2200</span> Total Messages
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-6">
              <div class="sm-st clearfix">
                <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                <div class="sm-st-info">
                  <span>100,320</span> Total Profit
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-6">
              <div class="sm-st clearfix">
                <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                <div class="sm-st-info">
                  <span>4567</span> Total Documents
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <form id="formCat" class="form-section panel" action="" method="post">
              <header class="panel-heading">
                Crear Categoria
              </header>
              <div class="panel-body">
                <input id="categoryTitle" type="text" class="form-control" placeholder="Nombre de Categoria">
                <div class="clear"></div>
                <textarea id="descriptionx" class="form-control h100" rows="4" placeholder="Descripción"></textarea>
              </div>
              <div class="panel-body">
                <button type="button" id="createCategory" class="z-btn bgGreen cWhite" name="createCategory">Crear</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Main row -->

    <div class="row hidden">
      <div id="grafica_ganancias" class="col-lg-8 col-md-8 hidden">
        <!--earning graph start-->
        <section class="panel">
          <header class="panel-heading">
            Earning Graph
          </header>
          <div class="panel-body">
            <canvas id="linechart" width="600" height="330"></canvas>
          </div>
        </section>
        <!--earning graph end-->

      </div>
      <div id="notificaciones" class="col-lg-4 hidden">
        <!--chat start-->
        <section class="panel">
          <header class="panel-heading">
            Notifications
          </header>
          <div class="panel-body" id="noti-box">

            <div class="alert alert-block alert-danger">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>
            <div class="alert alert-success">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Well done!</strong> You successfully read this important alert message.
            </div>
            <div class="alert alert-info">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
            </div>
            <div class="alert alert-warning">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Warning!</strong> Best check yo self, you're not looking too good.
            </div>


            <div class="alert alert-block alert-danger">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>
            <div class="alert alert-success">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Well done!</strong> You successfully read this important alert message.
            </div>
            <div class="alert alert-info">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
            </div>
            <div class="alert alert-warning">
              <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
              <strong>Warning!</strong> Best check yo self, you're not looking too good.
            </div>



          </div>
        </section>



      </div>
    </div>
    <div class="row">

      <div id="solicitudes_socios" class="col-md-lg-12 col-md-12">
        <section class="panel">
          <header class="panel-heading">
            Solicitudes
          </header>
          <div class="panel-body table-responsive">

            <table id="socTabla" class="table table-hover">
              <thead>
                <tr>
                  <th>Mail</th>
                  <th>Usuario</th>
                  <th>Negocio</th>
                  <th>Password</th>
                  <th>Rol</th>
                  <th>Estatus</th>
                  <th>Tipo de registro</th>
                  <th>Activacion</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $socios = user::getSoc();

              foreach ($socios as $key => $value) {

                $socios[$key]['active'] = ($socios[$key]['active'] == 0)? 'Inactivo' : 'activo';

                $row = '<tr>'.
                  '<td>'.$socios[$key]['username'].'</td>'.
                  '<td>'.$socios[$key]['name'].'</td>'.
                  '<td>'.$socios[$key]['negocio'].'</td>'.
                  '<td>'.$socios[$key]['pass'].'</td>'.
                  '<td>'.$socios[$key]['role'].'</td>'.
                  '<td>'.$socios[$key]['active'].'</td>'.
                  '<td>'.$socios[$key]['reg_type'].'</td>'.
                  '<td><form class="ActiveSoc" action="activateuser.php" method="post"><input type="hidden" value="'.$socios[$key]['username'].'" name="usuario"><button class="activeBtn"  type="button" >Activar</button></form></td>'.
                  '</tr>';
                echo $row;
              }
              ?>
              </tbody>
            </table>
          </div>
        </section>


      </div>

      <!--end col-6 -->
      <div class="col-md-4 hidden">
        <section class="panel">
          <header class="panel-heading">
            Twitter Feed
          </header>
          <div class="panel-body">
            <div class="twt-area">
              <form action="#" method="post">
                <textarea class="form-control" name="profile-tweet" placeholder="Share something on Twitter.." rows="3"></textarea>

                <div class="clearfix">
                  <button class="btn btn-sm btn-primary pull-right" type="submit">
                              <i class="fa fa-twitter"></i>
                              Tweet
                          </button>
                  <a class="btn btn-link btn-icon fa fa-location-arrow" data-original-title="Add Location" data-placement="bottom" data-toggle="tooltip" href="#" style="text-decoration:none;" title=""></a>
                  <a class="btn btn-link btn-icon fa fa-camera" data-original-title="Add Photo" data-placement="bottom" data-toggle="tooltip" href="#" style="text-decoration:none;" title=""></a>
                </div>
              </form>
            </div>
            <ul class="media-list">
              <li class="media">
                <a href="#" class="pull-left">
                  <img src="img/26115.jpg" alt="Avatar" class="img-circle" width="64" height="64">
                </a>
                <div class="media-body">
                  <span class="text-muted pull-right">
                              <small><em>30 min ago</em></small>
                          </span>
                  <a href="page_ready_user_profile.php">
                    <strong>John Doe</strong>
                  </a>
                  <p>
                    In hac <a href="#">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.
                    <a href="#" class="text-danger">
                      <strong>#dev</strong>
                    </a>
                  </p>
                </div>
              </li>
              <li class="media">
                <a href="#" class="pull-left">
                  <img src="img/26115.jpg" alt="Avatar" class="img-circle" width="64" height="64">
                </a>
                <div class="media-body">
                  <span class="text-muted pull-right">
                              <small><em>30 min ago</em></small>
                          </span>
                  <a href="page_ready_user_profile.php">
                    <strong>John Doe</strong>
                  </a>
                  <p>
                    In hac <a href="#">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.
                    <a href="#" class="text-danger">
                      <strong>#design</strong>
                    </a>
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </section>
      </div>

    </div>
    <div class="row hidden">
      <div class="col-md-5">
        <div class="panel">
          <header class="panel-heading">
            Teammates
          </header>

          <ul class="list-group teammates">
            <li class="list-group-item">
              <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
              <span class="pull-right label label-danger inline m-t-15">Admin</span>
              <a href="">Damon Parker</a>
            </li>
            <li class="list-group-item">
              <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
              <span class="pull-right label label-info inline m-t-15">Member</span>
              <a href="">Joe Waston</a>
            </li>
            <li class="list-group-item">
              <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
              <span class="pull-right label label-warning inline m-t-15">Editor</span>
              <a href="">Jannie Dvis</a>
            </li>
            <li class="list-group-item">
              <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
              <span class="pull-right label label-warning inline m-t-15">Editor</span>
              <a href="">Emma Welson</a>
            </li>
            <li class="list-group-item">
              <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
              <span class="pull-right label label-success inline m-t-15">Subscriber</span>
              <a href="">Emma Welson</a>
            </li>
          </ul>
          <div class="panel-footer bg-white">
            <!-- <span class="pull-right badge badge-info">32</span> -->
            <button class="btn btn-primary btn-addon btn-sm">
                                  <i class="fa fa-plus"></i>
                                  Add Teammate
                              </button>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <section class="panel tasks-widget">
          <header class="panel-heading">
            Todo list
          </header>
          <div class="panel-body">

            <div class="task-content">

              <ul class="task-list">
                <li>
                  <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" class="flat-grey list-child" />
                    <!-- <input type="checkbox" class="square-grey"/> -->
                  </div>
                  <div class="task-title">
                    <span class="task-title-sp">Director is Modern Dashboard</span>
                    <span class="label label-success">2 Days</span>
                    <div class="pull-right hidden-phone">
                      <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" class="flat-grey" />
                  </div>
                  <div class="task-title">
                    <span class="task-title-sp">Fully Responsive & Bootstrap 3.0.2 Compatible</span>
                    <span class="label label-danger">Done</span>
                    <div class="pull-right hidden-phone">
                      <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" class="flat-grey" />
                  </div>
                  <div class="task-title">
                    <span class="task-title-sp">Latest Design Concept</span>
                    <span class="label label-warning">Company</span>
                    <div class="pull-right hidden-phone">
                      <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" class="flat-grey" />
                  </div>
                  <div class="task-title">
                    <span class="task-title-sp">Write well documentation for this theme</span>
                    <span class="label label-primary">3 Days</span>
                    <div class="pull-right hidden-phone">
                      <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" class="flat-grey" />
                  </div>
                  <div class="task-title">
                    <span class="task-title-sp">Don't bother to download this Dashbord</span>
                    <span class="label label-inverse">Now</span>
                    <div class="pull-right">
                      <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" class="flat-grey" />
                  </div>
                  <div class="task-title">
                    <span class="task-title-sp">Give feedback for the template</span>
                    <span class="label label-success">2 Days</span>
                    <div class="pull-right hidden-phone">
                      <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" class="flat-grey" />
                  </div>
                  <div class="task-title">
                    <span class="task-title-sp">Tell your friends about this admin template</span>
                    <span class="label label-danger">Now</span>
                    <div class="pull-right hidden-phone">
                      <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </li>

              </ul>
            </div>

            <div class=" add-task-row">
              <a class="btn btn-success btn-sm pull-left" href="#">Add New Tasks</a>
              <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- row end -->
  </section>
  <!-- /.content -->
<?php } else { ?>
  <section class="z-container-fluid">
    <div class="z-block hFull">
      <div class="z-content z-contentMiddle">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <section class="panel">
              <header class="panel-heading">
                  Login
              </header>
              <div class="panel-body">
                  <form role="form">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block">Example block-level help text here.</p>
                      </div>
                      <div class="checkbox">
                          <label>
                              <input type="checkbox"> Check me out
                          </label>
                      </div>
                      <button type="submit" class="btn btn-info">Submit</button>
                  </form>

              </div>
          </section>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php include ('footer.php'); ?>
