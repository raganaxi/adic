<?php
include ('header.php');
//autoloader para cargar clases
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

  if(!isset($_SESSION['user'])){
    header('Location: '.'index.php');
  }
?>
<?php include ('menu.php'); ?>


  <main canvas="container" class="z-container noPadding scroll bgLightGrey">

    <section class="z-container mainContainer">
      <div class="z-row">
        <div id="postContainer" class="z-col-lg-4 z-col-md-4 z-col-sm-6 z-col-xs-12">

        <?php
        $resultPost = user::getPost();

        foreach ($resultPost as $key => $value) {
        ?>


          <div class="z-panel z-forceBlock bgTransparent wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
            <a href="profile1.php" class="z-panelHeader noPadding noBorder">
              <div class="z-row noMargin">
                <div class="z-col-lg-3 z-col-md-3 z-col-sm-2 z-col-xs-2 noPadding">
                  <div class="z-block h100 panelImg bgBlue">
                      <img src="<?php  echo $resultPost[$key]['user_pic']; ?>" >
                  </div>
                </div>
                <div class="z-col-lg-9 z-col-md-9 z-col-sm-10 z-col-xs-10">
                  <div class="z-block h100">
                    <div class="z-content z-contentTop">
                      <h3 class="noMargin text-uppercase text-uppercase s20 cDark text-bold"><?php  echo $resultPost[$key]['title']; ?></h3>
                      <div class="clear"></div>
                      <h4 class="noMargin cDark">Calle fulana #45, Centro. Torreón, Coahuila.</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </a>
            <div class="z-panelBody z-block overflowHidden noPadding">
              <div id="" class="bgDarkBlueClear z-row h300 panelImg">
                  <img src="<?php  echo $resultPost[$key]['image']; ?>" >
              </div>
              <div class="z-row noMargin">
                <div class="z-col-lg-12 z-col-md-12 z-col-sm-12 z-col-xs-12 bgTransparent">
                  <div class="z-block h100 mh100 overflowAuto">
                    <div class="z-content z-contentMiddle">
                      <p class="cDark s15 text-bold s15">
                      Publicado por: <?php  echo $resultPost[$key]['user_name']; ?>
                    <br>
                          Categoria: <?php  echo $resultPost[$key]['categoria']; ?>
                      <br>
                       <?php  echo $resultPost[$key]['description']; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="z-panelFooter z-block h50 overflowHidden noPadding bgTransparent">
              <a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20">
                <span class="fa fa-share"></span>
              </a>
              <a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20">
                <span class="fa fa-thumbs-up"></span>
              </a>
              <a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20">
                <span class="fa fa-tag"></span>
              </a>
            </div>
          </div>


        <?php } ?>



        </div>
      </div>

    </section>
  </main>

  <svg class="hidden" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <filter id="blur">
      <feGaussianBlur stdDeviation="30" />
    </filter>
  </svg>
<?php include ('footer.php'); ?>
