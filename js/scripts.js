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
    var controller = new slidebars();
    controller.init();

    $("#do_drag").swipe({
      swipeStatus: function (event, phase, direction, distance, duration, fingers) {
        if (phase == "move" && direction == "right") {
          openAside();
          return false;
        }
        if (phase == "move" && direction == "left") {
          closeAside();
          return false;
        }
      }
    });
    $("#do_drag_search_open").swipe({
      swipeStatus: function (event, phase, direction, distance, duration, fingers) {
        if (phase == "move" && direction == "left") {
          openAsideSearch();
          return false;
        }
        if (phase == "move" && direction == "right") {
          closeAsideSearch();
          return false;
        }
      }
    });

    var wow = new WOW({
      offset: 100,
      mobile: true,
      live: true,
      scrollContainer: '.scroll'
    })
    wow.init();

    fullHeight();

    $('.fab').click(function(){
      if ($('.nav-modal').hasClass('active')){
        $(".nav-modal").removeClass("active");
        $('body').removeClass('overflowHidden');
      } else {
      	$(".nav-modal").addClass("active");
        $('body').addClass('overflowHidden');
      }
    });

    $( '#openAside' ).click(function(e){
      e.preventDefault();
      e.stopPropagation();
      toggleAside();
    })
    $( '#openSearch' ).click(function(e){
      e.preventDefault();
      e.stopPropagation();
      toggleAsideSearch();
    })

    function toggleAside(){
      controller.toggle('asideNav');
      toggleSwipeArea();
    }
    function openAside(){
      controller.open('asideNav');
      toggleSwipeArea();
    }
    function closeAside(){
      controller.close('asideNav');
      toggleSwipeArea();
    }

    function toggleAsideSearch(){
      controller.toggle('searchNav');
      /*toggleSwipeArea();*/
    }
    function openAsideSearch(){
      controller.open('searchNav');
      /*toggleSwipeArea();*/
    }
    function closeAsideSearch(){
      controller.close('searchNav');
      /*toggleSwipeArea();*/
    }

    function toggleSwipeArea(){
      if($('#do_drag').hasClass('navOpen')){
        $('#do_drag').removeClass('navOpen');
      } else {
        $('#do_drag').addClass('navOpen');
      }
    }
    function toggleSwipeAreaSearch(){
      if($('#do_drag_search_open').hasClass('navOpen')){
        $('#do_drag_search_open').removeClass('navOpen');
      } else {
        $('#do_drag_search_open').addClass('navOpen');
      }
    }

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

  //crear cuenta por email
  $("#crteAccountE").on('click', function(){
      $.ajax({
        data:  {
        "reg_user" : 1,
        "mail": $("#ruMail").val(),
        "pass": $("#ruPass").val()
        },
        url: 'classes/ajaxUsers.php',
        type: 'post'
      }).done(function(data){
        data = $.parseJSON( data );
        console.log(data);
        if (data.Y == "Y") {
          alert('Registrado');
          window.location.replace("main.php");
        }else{
          alert('Erro usuario no registrado');
        }
      });  
  });

  $("#loginU").on('click', function(){

      $.ajax({
        data:  {
        "login_user" : 1,
        "mail": $("#logUser").val(),
        "pass": $("#logPass").val()
        },
        url: 'classes/ajaxUsers.php',
        type: 'post'
      }).done(function(data){
        if (data != 0) {
          alert('loggueado');
          window.location.replace("main.php");
        }else{
          alert('problemas al iniciar session');
        }
      });  
  });


    $("#logOutbtn").on('click', function(){

      $.ajax({
        data:  {
        "logout" : 1
        },
        url: 'classes/ajaxUsers.php',
        type: 'post'
      }).done(function(data){
        window.location.replace("index.php");
      });  
  });





    window.onload = function () { 
        
    $("#registerUser").validate({
        rules: {
          ruMail: {
            required: true,
            email: true
          },
          ruPass: {
            required: true,
            minlength: 5
          }
        },
        messages: {
          ruMail: "Porfavor ingresa un E-mail valido",
          ruPass: "Ingresa una contraseña con mas de 5 caracteres",
        }
      });
        
        
        
    $("#lognUser").validate({
        rules: {
          logUser: {
            required: true,
            email: true
          },
          logPass: {
            required: true,
            minlength: 5
          }
        },
        messages: {
          logUser: "Porfavor ingresa un E-mail valido",
          logPass: "Ingresa una contraseña con mas de 5 caracteres",
        }
      });
        
        
        
        

     }

    
    $("#registerUser input").on('keypress change', function(){
        var valid = $("#registerUser").valid();
        if(valid == true){
            $("#crteAccountE").prop("disabled", false);
        }else{
            $("#crteAccountE").prop("disabled", "disabled");
        }
    });    


    $("#lognUser input").on('keypress change', function(){
        var valid = $("#lognUser").valid();
        if(valid == true){
            $("#loginU").prop("disabled", false);
        }else{
            $("#loginU").prop("disabled", "disabled");
        }
    });  
      
