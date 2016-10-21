function createpost(title, description, user, date, category, image) {
	    var module =  '<div class="z-panel z-forceBlock bgTransparent wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">'+
            '<a href="profile1.php" class="z-panelHeader noPadding noBorder">'+
              '<div class="z-row noMargin">'+
               '<div class="z-col-lg-3 z-col-md-3 z-col-sm-3 z-col-xs-4 noPadding">'+
                  '<div class="z-block h100 panelImg bgBlue">'+
                  '</div>'+
                '</div>'+
                '<div class="z-col-lg-9 z-col-md-9 z-col-sm-9 z-col-xs-8">'+
                  '<div class="z-block h100">'+
                    '<div class="z-content z-contentTop">'+
                      '<h3 class="noMargin text-uppercase text-uppercase s20 cDark text-bold">'+title+'</h3>'+
                      '<div class="clear"></div>'+
                      '<h4 class="noMargin cDark">Calle fulana #45, Centro. Torreón, Coahuila. Fecha: '+date+'</h4>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div class="clear"></div>'+
            '</a>'+
            '<div class="z-panelBody z-block overflowHidden noPadding">'+
              '<div id="" class="bgDarkBlueClear z-row h300 panelImg">'+
                ' <img src="'+image+'" >'+
              '</div>'+
              '<div class="z-row noMargin">'+
                '<div class="z-col-lg-12 z-col-md-12 z-col-sm-12 z-col-xs-12 bgTransparent">'+
                  '<div class="z-block h100 mh100 overflowAuto">'+
                    '<div class="z-content z-contentMiddle">'+
                      '<p class="cDark s15 text-bold s15">'+
                      'Publicado por:'+user+
                        '<br>'+
                        'Categoria: '+category+
                      '<br>'+
                       description+
                      '</p>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="z-panelFooter z-block h50 overflowHidden noPadding bgTransparent">'+
              '<a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20">'+
                '<span class="fa fa-share"></span>'+
              '</a>'+
              '<a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20">'+
                '<span class="fa fa-thumbs-up"></span>'+
              '</a>'+
              '<a role="button" class="z-content-fluid z-contentMiddle z-btn cGrey text-center s20">'+
                '<span class="fa fa-tag"></span>'+
              '</a>'+
            '</div>'+
          '</div>';
    return module;     
}


function createList(id, name) {
    var option = '<option value="'+id+'">'+name+'</option>';
    return option;
}