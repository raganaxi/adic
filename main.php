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
          <div class="z-panel z-forceBlock bgWhite wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
            <div class="z-panelHeader noPadding noBorder">
              <div class="z-row noMargin">
                <div class="z-col-lg-3 z-col-md-3 z-col-sm-2 z-col-xs-2 noPadding">
                  <div class="z-block h70">
                    <a href="profile1.php" class="z-content z-contentMiddle">
                      <div class="profileImg panelImg" style="background-image:url('<?php  echo $resultPost[$key]['user_pic']; ?>');">
                      </div>
                    </a>
                  </div>
                </div>

                <div class="z-col-lg-9 z-col-md-9 z-col-sm-10 z-col-xs-8">
                  <div class="z-block h70">
                    <div class="z-content z-contentMiddle">
                      <a href="profile1.php" class="noMargin text-uppercase text-uppercase s15 cDark text-bold"><?php  echo $resultPost[$key]['user_name']; ?></a>
                      <p class="noMargin cDark hidden">Calle fulana #45, Centro. Torreón, Coahuila.</p>
                    </div>
                  </div>
                </div>
                <div class="z-col-lg-3 z-col-md-3 z-col-sm-2 z-col-xs-2 noPadding">
                  <div class="z-block h70">
                    <div class="z-content z-contentMiddle text-center">
                      <span class="fa fa-star-o s20 cGrey"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="z-panelBody z-block overflowHidden noPadding">
              <div id="" class="bgDarkBlueClear ofertaImg panelImg" style="background-image:url('<?php  echo $resultPost[$key]['image']; ?>')">
              </div>
              <div class="z-row noMargin">
                <div class="z-col-lg-12 z-col-md-12 z-col-sm-12 z-col-xs-12 bgTransparent">
                  <div class="z-block h100 mh100 overflowAuto">
                    <div class="z-content z-contentMiddle">
                      <p class="cDark s15">
                        <span class="text-bold text-uppercase"><?php  echo $resultPost[$key]['title']; ?> </span>
                        <span class="hidden"><?php  echo $resultPost[$key]['categoria']; ?> </span><br>
                        <?php  echo $resultPost[$key]['description']; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="z-panelFooter z-block h40 overflowHidden noPadding bgTransparent">
              <a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20 noBorder">
                <span class="fa fa-share"></span>
              </a>
              <a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20 noBorder">
                <span class="fa fa-thumbs-up"></span>
              </a>
              <a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20 noBorder">
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
