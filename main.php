<?php include ('header.php'); ?>
<?php include ('menu.php'); ?>
  <main canvas="container" class="z-container noPadding scroll bgLightGrey">
    <section class="z-container mainContainer">
      <div class="z-row">
        <div class="z-col-lg-4 z-col-md-4 z-col-sm-6 z-col-xs-12">
          <div class="z-panel z-forceBlock bgTransparent  wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
            <a href="profile.php" class="z-panelHeader noPadding noBorder">
              <div class="z-row noMargin">
                <div class="z-col-lg-2 z-col-md-2 z-col-sm-2 z-col-xs-3 noPadding">
                  <div class="z-block h80 panelImg bgBlue">
                  </div>
                </div>
                <div class="z-col-lg-9 z-col-md-9 z-col-sm-9 z-col-xs-9">
                  <div class="z-block h80">
                    <div class="z-content z-contentBottom">
                      <h3 class="noMargin text-uppercase text-bold s20 cDark">Nombre </h3>
                      <h4 class="noMargin cDark s15">Calle fulana #45, Torreón</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </a>
            <div class="z-panelBody z-block overflowHidden noPadding">
              <div id="" class="bgDarkBlueClear z-row h300 panelImg">
              </div>
              <div class="z-row noMargin">
                <div class="z-col-lg-12 z-col-md-12 z-col-sm-12 z-col-xs-12 bgTransparent">
                  <div class="z-block h100 mh100 overflowAuto">
                    <div class="z-content z-contentMiddle">
                      <p class="cDark s15 text-bold s15">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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
