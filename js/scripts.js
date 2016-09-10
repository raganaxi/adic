/*
* Front-End Lab's - v0.0.1
*
* Application Core (Scripts)
*
*/

// Avoid `console` errors in browsers that lack a console.
'use strict';

(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());(function ( $, window, document, undefined ) {
  "use strict";
  // Place any jQuery/helper plugins in here.

  $(document).ready(function(){
    var wow = new WOW({
      offset: 100,
      mobile: true,
      live: true
    })
    wow.init();
    var options = {
      $menu: false,
      menuSelector: 'a',
      panelSelector: '.snap',
      namespace: '.panelSnap',
      onSnapStart: function(){},
      onSnapFinish: function(){},
      onActivate: function(){},
      directionThreshold: 50,
      slideSpeed: 500,
      delay: 0,
      easing: 'linear',
      offset: 0,
      navigation: {
        keys: {
          nextKey: false,
          prevKey: false,
        },
        buttons: {
          $nextButton: false,
          $prevButton: false,
        },
        wrapAround: false
      }
    };
    $('body').panelSnap(options);
    fullHeight();
    $('.fab').click(function(){
      if ($('.nav-modal').hasClass('active')){
        $(".nav-modal").removeClass("active");
        $('body').removeClass('overflowHidden');
      } else {
      	$(".nav-modal").addClass("active");
        $('body').addClass('overflowHidden');
      }
    })

    var stickyNavTop = $('.nav').offset().top;
    var stickyNav = function(){
      var scrollTop = $(window).scrollTop();
      if (scrollTop > stickyNavTop) {
          $('.nav').addClass('sticky');
      } else {
          $('.nav').removeClass('sticky');
      }
    };
     
    stickyNav();
     
    $(window).scroll(function() {
      stickyNav();
    });
  });

  $(window).resize(function(){
    fullHeight();
  })

  $(document).on('click', function(event) {

  if (!$(event.target).closest('.fab').length) {
    $(".nav-modal").removeClass("active");
    $('body').removeClass('overflowHidden');
  } else {
    $(".nav-modal").addClass("active");
    $('body').addClass('overflowHidden');
  }
});

})( jQuery, window, document );

function fullHeight() {
  var winHeight = $(window).outerHeight();
  $('.hFull').css('height', winHeight);
  $('.hFull').css('max-height', winHeight );
  if ($('.hFull-body').length != 0) {
    var nav = $('.nav').height();
    $('.hFull-body').css('height', winHeight - nav);
    $('.hFull-body').css('max-height', winHeight - nav);
  }
};
