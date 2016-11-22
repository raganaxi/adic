/*variables de session*/
var storage;
var app={};
var controller;
/**********************/
$(document).bind("mobileinit", function(){
	
	$.mobile.defaultPageTransition = "slidedown";
	$.mobile.loadingMessage = "Cargando app.";
	
	
	
});
$(document).ready(function() {
	loaderMain();
	function loaderMain(){
		inicializar();
		is_logged_in();
		
	}
	function is_logged_in(){
		app=getJsonApp();
		email=app.user.email;
		name=app.user.name;
		token=app.user.token;

		if (token!==""||email!==""){
			var data = {'action': 'sesion','token':token,'user_email':email};
			$.ajax({
				type : 'POST',
				crossDomain: true,			
				url  : '../classes/ajaxUsers.php',
				dataType: "json",
				data : data,
				cache: false,
			})
			.done(function( data, textStatus, jqXHR ) {
				if(data.continuar==="ok"){				
					$.mobile.changePage("#main");

				}
				else{
					var user={
						token:"",
						email:"",
						name:"",
					};
					app={				
						user:user
					};
					setJsonApp(app);
					$.mobile.changePage("#index");				
				}

			})
			.fail(function( jqXHR, textStatus, errorThrown ) {
				$.mobile.changePage("#index");
			});
		}
		else{
			/* no logueado*/
			$.mobile.changePage("#index");
			
		}
	}
	$("#loginU").on('click', function(event) {
		event.preventDefault();
		submitFormsubmitFormLogin();
	});
	/* funcion para login */
	function submitFormsubmitFormLogin()
	{  
		
		var data = $("#lognUser").serialize();

		$.ajax({

			type : 'POST',
			url  : '../classes/ajaxUsers.php',
			dataType: "json",
			data : data,
			cache: false,			
		})
		.done(function( data, textStatus, jqXHR ) {
			if(data.continuar==="ok"){
				var user=app.user;
				user.token=data.datos.token;
				user.email=data.datos.row[0].username;
				user.name=data.datos.row[0].username;
				user.rol=data.datos.row[0].role;
				user.id=data.datos.row[0].iduser;				
				app.user=user;
				storage.app=JSON.stringify(app);
				$.mobile.changePage("#main");
				is_logged_in();
				$('.modal').modal('hide');
			}
			else{

				alertMensaje('problemas al iniciar session');
			}
		})
		.fail(function( jqXHR, textStatus, errorThrown ) {
			alertMensaje('problemas al iniciar session'+errorThrown);
		});

	}
	function alertMensaje(mensaje){
		alert(mensaje);
	}
	function inicializar(){
		/* cambiamos nombre a local storage para un uso mas sensillo y para corregir problemas de navegadores que no lo soportan mas adelante*/
		try {
			if (localStorage.getItem) {
				storage = localStorage;
			}
		} catch(e) {
			storage = {};
		}
		if (storage.app===undefined) {
			var user={
				token:"",
				email:"",
				name:"",
			};
			app={
				user:user
			};
			storage.app=JSON.stringify(app);
		}else{
			app=getJsonApp();			
			if (app.user===undefined) {
				app.user={
					token:"",
					email:"",
					name:"",
				};
			}
			storage.app=JSON.stringify(app);				
		}
		/* codigo para splash*/
		$("#splash").owlCarousel({
			
			autoHeight : true,
			slideSpeed : 400,
			paginationSpeed : 400,
			singleItem:true,
			transitionStyle : "fade"
		});
		/* validaciones */
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
		/* validaciones de botones disabled */
		$("#lognUser input").on('keypress change', function(){
			var valid = $("#lognUser").valid();
			if(valid == true){
				$("#loginU").prop("disabled", false);
			}else{
				$("#loginU").prop("disabled", "disabled");
			}
		});
		$("#registerUser input").on('keypress change', function(){
			var valid = $("#registerUser").valid();
			if(valid == true){
				$("#crteAccountE").prop("disabled", false);
			}else{
				$("#crteAccountE").prop("disabled", "disabled");
			}
		});



	}

	function getJsonApp(){
		app=JSON.parse(storage.app);
		return app;
	}
	function setJsonApp(app){
		storage.app=JSON.stringify(app);
	}
	/* funcion para logout */
	$("#logOutbtn").on('click', function(){
		var data= {'action': 'logout','token':app.user.token};
		$.ajax({
			data:  data,
			url: '../classes/ajaxUsers.php',
			type: 'post'
		}).done(function(data){
			if (data.continuar==="ok") {
				var user={
					token:"",
					email:"",
					name:"",
				};
				app={				
					user:user
				};
				setJsonApp(app);
				is_logged_in();
			}

		});
	});
	/*crear cuenta por email*/
	$("#crteAccountE").on('click', function(){		
		var data= {'action': 'registerU',"mail": $("#ruMail").val(),"pass": $("#ruPass").val()};
		$.ajax({
			data:  data,
			url: '../classes/ajaxUsers.php',
			type: 'post'
		}).done(function(data){
			if(data.continuar==="ok"){
				var user=app.user;
				user.token=data.datos.token;
				user.email=data.datos.row[0].username;
				user.name=data.datos.row[0].username;
				user.rol=data.datos.row[0].role;
				user.id=data.datos.row[0].iduser;				
				app.user=user;
				storage.app=JSON.stringify(app);
				$.mobile.changePage("#main");
				is_logged_in();
				$('.modal').modal('hide');
			}
			else{

				alertMensaje('problemas al iniciar session');
			}

		});
	});
});