'use strict';

var urlLocal="http://localhost:81/cache/adic/";
var urlRemoto="http://adondeirenlaciudad.com/";
var appRuta='rApp.php';
urlRemoto=urlLocal;
var urlAjax=urlRemoto;

( function () {
  var method;
  var noop = function () {};
  var methods = [
  'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
  'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
  'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
  'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = ( window.console = window.console || {} );

  while ( length-- ) {
    method = methods[ length ];

    // Only stub undefined methods.
    if ( !console[ method ] ) {
      console[ method ] = noop;
    }
  }
}() );
( function ( $, window, document, undefined ) {
  "use strict";
  // Place any jQuery/helper plugins in here.

  $( document ).ready( function () {
    /*
    if ( $( '.splash' ).length != 0 ) {
      var welcomescreen_slides = [
        {
          id: 'slide0',
          picture: '<div class="splash slide0"></div><div class="bgCover bgTransparent"></div>',
          text: '<div class="splashContent">Bienvenido, este es el slide 1.</div>'
        },
        {
          id: 'slide1',
          picture: '<div class="splash slide1"></div><div class="bgCover bgTransparent"></div>',
          text: '<div class="splashContent">This is slide 2</div>'
        },
        {
          id: 'slide2',
          picture: '<div class="splash slide2"></div><div class="bgCover bgTransparent"></div>',
          text: '<div class="splashContent">This is slide 3</div>'
        },
        {
          id: 'slide3',
          picture: '<div class="splash slide3"></div><div class="bgCover bgTransparent"></div>',
          text: '<div class="splashContent">This is slide 4</div>'
        },
        {
          id: 'slide4',
          picture: '<div class="splash slide4"></div><div class="bgCover"></div>',
          text: '<div class="splashContent">' +
            '<div class="z-col-lg-4 z-col-md-4 z-col-sm-4 z-col-sm-offset-0 z-col-xs-8 z-col-xs-offset-2">' +
            '<a href="#" class="z-btn btn-rounded h50 bgGreen cWhite s20 text-center noTransform boxShadow welcomescreen-closebtn close-welcomescreen">' +
            'Comienza ya' +
            '</a>' +
            '</div>' +
            '</div>'
        }
      ];
      var options = {
        'bgcolor': '#333333',
        'fontcolor': '#fff',
        'closeButton': true,
        'cssClass': "bgTransparent",
        'onClosed': function () {
          renderMainSplash();
          fullHeight();
        },
        'open': true
      }
      var welcomescreen = new Welcomescreen( welcomescreen_slides, options );
    }

    function renderMainSplash() {
      $( '.splash' ).addClass( 'main' ).removeClass( 'bgDark' ).append(
        '<div class="bgCover"></div>' +
        '<div class="z-container">' +
        '<div class="hFull z-block">' +
        '<div class="z-content z-contentMiddle">' +
        '<div class="z-row">' +
        '<div class="z-col-lg-6 z-col-md-8 z-col-sm-10 z-col-xs-12 z-col-lg-offset-3 z-col-md-offset-2 z-col-sm-offset-1 z-col-xs-offset-0">' +
        '<img src="../images/logos/logo.png" class="centered z-forceBlock wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s" />' +
        '</div>' +
        '</div>' +
        '<div class="clear h100"></div>' +
        '<div class="z-row wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">' +
        '<div class="z-col-xs-12">' +
        '<h1 class="cWhite text-center s25">Bienvenido</h1>' +
        '</div>' +
        '<div class="z-col-lg-4 z-col-lg-offset-2 z-col-md-4 z-col-md-offset-2 z-col-sm-4 z-col-sm-offset-2 z-col-xs-8 z-col-xs-offset-2">' +
        '<a href="main.html" class="z-btn h50 btn-rounded bgGreen cWhite s20 text-center noTransform boxShadow" data-toggle="modal" data-target="#loginModal">' +
        'Inicia sesión<br>' +
        '</a>' +
        '<div class="clear"></div>' +
        '</div>' +
        '<div class="z-col-lg-4 z-col-md-4 z-col-sm-4 z-col-sm-offset-0 z-col-xs-8 z-col-xs-offset-2">' +
        '<a href="main.html" class="z-btn btn-rounded h50 bgLightBlue cWhite s20 text-center noTransform boxShadow" data-toggle="modal" data-target="#regModal">' +
        'Crea una cuenta' +
        '</a>' +
        '<div class="clear"></div>' +
        '</div>' +
        '<div class="z-col-lg-6 z-col-md-8 z-col-sm-10 z-col-xs-12 z-col-lg-offset-3 z-col-md-offset-2 z-col-sm-offset-1 z-col-xs-offset-0">' +
        '<a href="socios.php" class="cWhite s15 text-center noTransform z-block">' +
        'Acceso a Socios' +
        '</a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
      );
    }
    */
    $( ".p2r" ).xpull( {
      'callback': function () {
        location.reload();
      }
    } );

    //var controller = new slidebars();
    //controller.init();

    // $( "#do_drag" ).swipe( {
    //   swipeStatus: function ( event, phase, direction, distance, duration, fingers ) {
    //     if ( phase == "move" && direction == "right" ) {
    //       openAside();
    //       return false;
    //     }
    //     if ( phase == "move" && direction == "left" ) {
    //       closeAside();
    //       return false;
    //     }
    //   }
    // } );
    // $( "#do_drag_search_open" ).swipe( {
    //   swipeStatus: function ( event, phase, direction, distance, duration, fingers ) {
    //     if ( phase == "move" && direction == "left" ) {
    //       openAsideSearch();
    //       return false;
    //     }
    //     if ( phase == "move" && direction == "right" ) {
    //       closeAsideSearch();
    //       return false;
    //     }
    //   }
    // } );

    var wow = new WOW( {
      offset: 100,
      mobile: true,
      live: true,
      scrollContainer: '.scroll'
    } )
    wow.init();

    fullHeight();

    $( '.fab' ).click( function () {
      if ( $( '.nav-modal' ).hasClass( 'active' ) ) {
        $( ".nav-modal" ).removeClass( "active" );
        $( 'body' ).removeClass( 'overflowHidden' );
      }
      else {
        $( ".nav-modal" ).addClass( "active" );
        $( 'body' ).addClass( 'overflowHidden' );
      }
    } );

    $( '#openAside' ).click( function ( e ) {
      e.preventDefault();
      e.stopPropagation();
      toggleAside();
    } )
    $( '#openSearch' ).click( function ( e ) {
      e.preventDefault();
      e.stopPropagation();
      toggleAsideSearch();
    } )

    function toggleAside() {
      controller.toggle( 'asideNav' );
      toggleSwipeArea();
    }

    function openAside() {
      controller.open( 'asideNav' );
      toggleSwipeArea();
    }

    function closeAside() {
      controller.close( 'asideNav' );
      toggleSwipeArea();
    }

    function toggleAsideSearch() {
      controller.toggle( 'searchNav' );
      /*toggleSwipeArea();*/
    }

    function openAsideSearch() {
      controller.open( 'searchNav' );
      /*toggleSwipeArea();*/
    }

    function closeAsideSearch() {
      controller.close( 'searchNav' );
      /*toggleSwipeArea();*/
    }

    function toggleSwipeArea() {
      if ( $( '#do_drag' ).hasClass( 'navOpen' ) ) {
        $( '#do_drag' ).removeClass( 'navOpen' );
      }
      else {
        $( '#do_drag' ).addClass( 'navOpen' );
      }
    }

    function toggleSwipeAreaSearch() {
      if ( $( '#do_drag_search_open' ).hasClass( 'navOpen' ) ) {
        $( '#do_drag_search_open' ).removeClass( 'navOpen' );
      }
      else {
        $( '#do_drag_search_open' ).addClass( 'navOpen' );
      }
    }

    if ( $( '.nav' ).length != 0 ) {
      var stickyNavTop = $( '.nav' ).offset().top;
      var stickyNav = function () {
        var scrollTop = $( window ).scrollTop();
        if ( scrollTop > stickyNavTop ) {    
          $( '.nav' ).addClass( 'sticky' );
        }
        else {    
          $( '.nav' ).removeClass( 'sticky' );
        }
      }; 
      stickyNav();
    }

    $( window ).scroll( function () {  
      stickyNav();
    } );
  } );

$( window ).resize( function () {
  fullHeight();
} )

$( document ).on( 'click', function ( event ) {

  if ( !$( event.target ).closest( '.fab' ).length ) {
    $( ".nav-modal" ).removeClass( "active" );
    $( 'body' ).removeClass( 'overflowHidden' );
  }
  else {
    $( ".nav-modal" ).addClass( "active" );
    $( 'body' ).addClass( 'overflowHidden' );
  }
} );

} )( jQuery, window, document );

function fullHeight() {
  var winHeight = $( window ).outerHeight();
  $( '.hFull' ).css( 'height', winHeight );
  $( '.hFull' ).css( 'max-height', winHeight );
  if ( $( '.hFull-body' ).length != 0 ) {
    var nav = $( '.nav' ).height();
    $( '.hFull-body' ).css( 'height', winHeight - nav );
    $( '.hFull-body' ).css( 'max-height', winHeight - nav );
  }
};

//crear cuenta por email
$( "#crteAccountE" ).on( 'click', function () {
  $.ajax( {
    data: {
      "reg_user": 1,
      "mail": $( "#ruMail" ).val(),
      "pass": $( "#ruPass" ).val()
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  } ).done( function ( data ) {
    data = $.parseJSON( data );
    console.log( data );
    if ( data.Y == "Y" ) {
      //alert('Registrado');
      window.location.replace( "main.php" );
    }
    else {
      alert( 'Erro usuario no registrado' );
    }
  } );
} );

$( "#searchBtn" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "search_post": 1,
      "search_terms": $( "#search" ).val()
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, 'brayan', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );

//buscar restaurantes
$( "#findRestaurant" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "search_post": 1,
      "search_terms": 'Restaurant'
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, '', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );

//buscar bares
$( "#findBar" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "search_post": 1,
      "search_terms": 'Bar'
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, '', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );
//buscar antros
$( "#findAntro" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "search_post": 1,
      "search_terms": 'Antro'
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, '', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );
//buscar foodtrucks
$( "#findFoodTruck" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "search_post": 1,
      "search_terms": 'FoodTrucks'
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, '', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );
//buscar eventos
$( "#findEvent" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "search_post": 1,
      "search_terms": 'Eventos'
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, '', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );
//buscar ubicaciones
$( "#findUbication" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "search_post": 1,
      "search_terms": 'Ubicaciones'
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, '', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );

$( "#createCategory" ).on( 'click', function () {
  $.ajax( {
    data: {
      "register_Cat": 1,
      "name": $( "#categoryTitle" ).val(),
      "desc": $( "#descriptionx" ).val()
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );
    if ( data[ 0 ].Y ) {
      console.log( data );
      alert( 'Categoria registrada exitosamente' );
      data = null;
    }
    else {
      console.log( data );
      alert( 'Problemas al registrar Categoria' );
      data = null;
    }
  } );

  $( '#category' ).empty();

  $.ajax( {
    data: {
      "get_Category": 1
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );
    $.each( data, function ( index, value ) {
      $( '#category' ).append( createList( data[ index ].idcategory, data[ index ].nombre ) );
      console.log( data[ index ] );
    } );
  } );

} );

//crear cuenta por email socio
$( "#createSoc" ).on( 'click', function () {
  var type;
  var category = '';
  if($('#registerSocio').length != 0 ){
    type = "mail";
  }
  if($('#registerSocio-admin').length != 0 ){
    type = "admininstrador";
    category = $( '#category' ).val();
  }
  $.ajax( {
    data: {
      "reg_soc": 1,
      "name": $( "#nameSocio" ).val(),
      "phone": $( "#telSocio" ).val(),
      "mail": $( "#mailSocio" ).val(),
      "typeReg" : type,
      "negocio": $( "#nameNegocio" ).val(),
      "category": category
        //"pass": $("#passwSocio").val(),
        //"img": document.getElementById("imgProfile").files[0].name
      },
      url: '../classes/ajaxUsers.php',
      type: 'post'
    } ).done( function ( data ) {
      data = $.parseJSON( data );
      console.log( data );
      if ( data ) {
      //alert('Registrado');
      //window.location.replace("profile.php");
      if($('#registerSocio').length != 0 ){
        $( "#registerSocio" ).empty();
        $("#registerSocio").append(
          '<h1>¡Gracias!</h1>'+
          '<p>Tu solicitud es muy importante para nosotros, te pedimos de favor que estes al pendiente de tu correo o telefono.</p>'+
          '<p>Nos comunicaremos contigo a la brevedad posible.</p>'+
          '<div class="clearfix"></div>'+
          '<div class="separator">'+
          '<div class="hidden">'+
          '  <p>Copyright (c) 2015 Copyright Holder All Rights Reserved.</p>'+
          '</div>'+
          '</div>');
      }
      if($('#registerSocio-admin').length != 0){
        $('#registerSocio-admin').trigger('reset');
      }
    }
    else {
      alert( 'Erro usuario no registrado' );
    }
  } );
  } );



// $( "#loginU" ).on( 'click', function () {
//   $.ajax( {
//     data: {
//       "login_user": 1,
//       "mail": $( "#logUser" ).val(),
//       "pass": $( "#logPass" ).val()
//     },
//     url: '../classes/ajaxUsers.php',
//     type: 'post'
//   } ).done( function ( data ) {
//     if ( data != 0 ) {
//       //alert('loggueado');
//       window.location.replace( "main.php" );
//     }
//     else {
//       alert( 'problemas al iniciar session' );
//     }
//   } );
// } );

//activacion de socios
$( ".activeBtn" ).on( 'click', function () {
  var $activeBtn = $(this);
  var $userID = $($activeBtn).closest('tr').find('.iduser').val();
  $.ajax( {
    data: {
      "activate_soc": 1,
      "iduser": $userID
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  }).done( function ( data ) {
    if ( data != 0 ) {
      $($activeBtn).closest('tr').addClass('bgGreenClear');
      setTimeout(function(){
        $($activeBtn).closest('tr').addClass('hidden');
      },400);
    }
    else {
      console.log( 'problemas al activar usuario' );
      console.log(data);
    }
  } );
} );

//desactivacion de socios
$( ".deactiveBtn" ).on( 'click', function () {
  var $deactiveBtn = $(this);
  var $userID = $($deactiveBtn).closest('tr').find('.iduser').val();
  $.ajax( {
    data: {
      "deactivate_soc": 1,
      "iduser": $userID
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  }).done( function ( data ) {
    if ( data != 0 ) {
      $($deactiveBtn).closest('tr').addClass('bgRedClear');
      setTimeout(function(){
        $($deactiveBtn).closest('tr').addClass('hidden');
      },400);
    }
    else {
      console.log( 'problemas al activar usuario' );
      console.log(data);
    }
  } );
} );

//desactivacion de socios
$( "#changeAccess" ).on( 'click', function () {
  var change = $(this);
  var userID = $(change).closest('form').find('#userID').val();
  var username = $(change).closest('form').find('#usernameP').val();
  var oldPass = $(change).closest('form').find('#oldPassP').val();
  var newPass = $(change).closest('form').find('#newPassP').val();
  $.ajax( {
    data: {
      "change_access": 1,
      "iduser": userID,
      "username": username,
      "oldPass": oldPass,
      "newPass": newPass
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  }).done( function ( data ) {
    if ( data != 0 ) {
      window.location.replace( "dashboard.php" );
    }
    else {
      console.log( 'problemas al actualizar usuario' );
      console.log(data);
    }
  } );
} );

$( "#logSocio" ).on( 'click', function () {
  $.ajax( {
    data: {
      "login_user": 1,
      "mail": $( "#userSoc" ).val(),
      "pass": $( "#passwSoc" ).val()
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  } ).done( function ( data ) {
    if ( data != 0 ) {
      data = jQuery.parseJSON( data );
      if(data[0].role !== 'usuario'){
        //console.log(data);
        window.location.replace( "dashboard.php" );
      } else {
        alert('acceso solo para socios')
        window.location.replace( "logout.php" );
      }
    }
    else {
      console.log( 'problemas al iniciar session' );
      console.log(data);
    }
  } );
} );

$( ".profileU" ).on( 'click', function () {
  $( this ).submit();
} );

$( "#logOutbtn" ).on( 'click', function () {
  $.ajax( {
    data: {
      "logout": 1
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  } ).done( function ( data ) {
    window.location.replace( "index.php" );
  } );
} );

$( "#editProfile" ).on( 'click', function () {
  // var profilePic;
  // if (document.getElementById( "fileToUpload" ).files[ 0 ].name == undefined) {
  //   profilePic = "01.png";
  // } else {
  //   profilePic = document.getElementById( "fileToUpload" ).files[ 0 ].name;
  // }
  $.ajax( {
    data: {
      "editProfile": 1,
      "name": $( "#nameP" ).val(),
      "number": $( "#phoneP" ).val(),
      "negocio": $( "#negocioP" ).val(),
      //"file": profilePic
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  } ).done( function ( data ) {
    if ( data ) {
      console.log(data);
      //$( "#editProfileF" ).submit();
    }
  } );

} );

$('#saveDireccion').on('click', function(){
  $.ajax({
    data: {
      "save_direccion": 1,
      "calle": $('#calleDir').val(),
      "numero": $('#numeroDir').val(),
      "municipio": $('#municipioDir').val(),
      "estado": $('#estadoDir').val(),
      "pais": $('#paisDir').val(),
      "cp": $('#cpDir').val(),
      "lat": $('#latDir').val(),
      "lon": $('#lonDir').val()
    },
    url: '../classes/ajaxUsers.php',
    type: 'post'
  }).done(function(data){
    if(data){
      console.log(data);
    }
  })
})

// window.onload = function () {
//
//   $( "#registerUser" ).validate( {
//     rules: {
//       ruMail: {
//         required: true,
//         email: true
//       },
//       ruPass: {
//         required: true,
//         minlength: 5
//       }
//     },
//     messages: {
//       ruMail: "Porfavor ingresa un E-mail valido",
//       ruPass: "Ingresa una contraseña con mas de 5 caracteres",
//     }
//   } );
//
//
//   $( "#registerSocio" ).validate( {
//     rules: {
//       nameSocio: {
//         required: true
//       },
//       telSocio: {
//         required: true
//       },
//       mailSocio: {
//         required: true,
//         email: true
//       },
//       passwSocio: {
//         required: true,
//         minlength: 5
//       }
//     },
//     messages: {
//       nameSocio: "Porfavor ingresa un nombre",
//       telSocio: "Porfavor ingresa un telefono",
//       mailSocio: "Porfavor ingresa un E-mail valido",
//       passwSocio: "Ingresa una contraseña con mas de 5 caracteres",
//     }
//   } );
//
//   // id de boton createSoc
//
//
//   $( "#lognUser" ).validate( {
//     rules: {
//       logUser: {
//         required: true,
//         email: true
//       },
//       logPass: {
//         required: true,
//         minlength: 5
//       }
//     },
//     messages: {
//       logUser: "Porfavor ingresa un E-mail valido",
//       logPass: "Ingresa una contraseña con mas de 5 caracteres",
//     }
//   } );
// }

// $( "#registerSocio input" ).on( 'keypress change', function () {
//   var valid = $( "#registerSocio" ).valid();
//   if ( valid == true ) {
//     $( "#createSoc" ).prop( "disabled", false );
//   }
//   else {
//     $( "#createSoc" ).prop( "disabled", "disabled" );
//   }
// } );
//
// $( "#registerUser input" ).on( 'keypress change', function () {
//   var valid = $( "#registerUser" ).valid();
//   if ( valid == true ) {
//     $( "#crteAccountE" ).prop( "disabled", false );
//   }
//   else {
//     $( "#crteAccountE" ).prop( "disabled", "disabled" );
//   }
// } );
//
// $( "#lognUser input" ).on( 'keypress change', function () {
//   var valid = $( "#lognUser" ).valid();
//   if ( valid == true ) {
//     $( "#loginU" ).prop( "disabled", false );
//   }
//   else {
//     $( "#loginU" ).prop( "disabled", "disabled" );
//   }
// } );

$( ".searchDay" ).on( 'click', function () {
  $( "#postContainer" ).empty();
  $.ajax( {
    data: {
      "postsDay": 1,
      "date": $( this ).val()
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );

    $.each( data, function ( index, value ) {
      console.log( data[ index ] );
      $( "#postContainer" ).append( createpost( data[ index ].title, data[ index ].description, 'brayan', data[ index ].date, data[ index ].categoria, data[ index ].image, data[ index ].user_pic ) );
    } );

  } );
} );

$( document ).ready( function () {
  $.ajax( {
    data: {
      "get_Category": 1
    },
    url: '../classes/ajaxPosts.php',
    type: 'post'
  } ).done( function ( data ) {
    data = jQuery.parseJSON( data );
    $.each( data, function ( index, value ) {
      $( '#category' ).append( createList( data[ index ].idcategory, data[ index ].nombre ) );
      //console.log(data[index]);
    } );
  } );
} );

/***** booz ********/
$(document).ready(function() {
  $('#imgDataTable').DataTable( {
    "ajax": '../classes/rApp.php?action=getImages',
    "columns": [
    { "data": "id" },
    { "data": "name" },
    { "data": "description" },
    { "data": "ubication" },
    { "data": "user_id" },
    ]
  });
  function getPost(){

    var data= {'action': 'getPostSocio',iduser:id_user};
    $.ajax({
      data:data,
      crossDomain: true,
      cache: false,
      xhrFields: {
        withCredentials: true
      },
      url: urlAjax+'classes/'+appRuta,
      type: 'post'
    }).done(function(data){
      if(data.continuar==="ok"){
        var post = data.datos.post;
        console.log(post);
        var addresses= data.datos.addresses;
        
      }
      else{
        var addresses= data.datos.addresses;

      }
      /*  ajaxLoader("termina");*/

    }).fail(function( jqXHR, textStatus, errorThrown ) {
      $("#postContainer").html('<div class="" style="min-height:100vh;height:300px;">Sin publicaciones :(');
      /* ajaxLoader("termina");*/
    });
  }
  $('#postContainer').each(function(index, el) {
    getPost();

    console.log('ready publicaciones');
    $(document).on('submit','#formCreatePost',function(e){
      e.preventDefault();
      var $form = $(this);

      uploadImage($form);
    });
    function uploadImage($form){
      var formData = new FormData($form[0]);
      formData.append("iduser", id_user);
      formData.append("title", $( "#postTitle" ).val());
      formData.append("description",$( "#postDescription" ).val());
      formData.append("date",$( "#postDate" ).val());
      formData.append("modulo", "post");
      formData.append("action", "a");
      console.log(formData);
      $.ajax({
        url: "upload.php",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
          $('#createPost').html('subiendo...');
        },
      })
      .done(function(res){
        console.log("Respuesta: " + res);
        $('#createPost').html('ok');
      }).fail(function(res) {
        console.log("fallo: " + res);
      }).always(function() {
        $('#createPost').html('Crear');
      });
      
      
    }

  });
  $('#formProfileimage').each(function(index, el) {

    console.log('ready profile');
    $(document).on('submit','#formProfileimage',function(e){
      e.preventDefault();
      var $form = $(this);
      console.log("clcik");

      uploadImage($form);
    });
    function uploadImage($form){
      var formData = new FormData($form[0]);
      formData.append("iduser", id_user);
      formData.append("modulo", "profileImage");
      formData.append("action", "a");
      console.log(formData);
      $.ajax({
        url: "upload.php",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
      })
      .done(function(res){

        console.log("Respuesta: " + res);
        if(res[0].img!==undefined){
          var img = res[0].img;
          console.log(img);
          $('.profile_pic div').attr({
            style: "background-image:url('../imagenes_/profPicture/"+img+"');"
          });
          $('#previewProfileImage').attr({
            src: "../imagenes_/profPicture/"+img
          });

        }

      });
    }

  });


});







