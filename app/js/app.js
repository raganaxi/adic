/*variables de session*/
var email;
var token;
var name;
/**********************/
$(document).bind("mobileinit", function(){
	
	$.mobile.defaultPageTransition = "slidedown";
	$.mobile.loadingMessage = "Cargando app.";
	
	
	
});
$(document).ready(function() {
	loaderMain();
	function loaderMain(){
		is_logged_in();
	}
	function is_logged_in(){
		email=localStorage.email;
		name=localStorage.name;
		token=localStorage.token;

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
				/*
				logeado
				*/
				$.mobile.changePage("#main");
				//$("#saludo").html('hola '+name);
			}
			else{
				if(data.error!="error")
				{
					/* error 
					$("#error").fadeIn(1000, function(){      
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data.mensaje+' !</div>');
						$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});*/
					$.mobile.changePage("#login");
					
				}				
			}
			
		})
			.fail(function( jqXHR, textStatus, errorThrown ) {
				$.mobile.changePage("#login");
			});
		}
		else{
			/* no logueado*/
			$.mobile.changePage("#login");
			
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
				localStorage.removeItem('token');
				localStorage.removeItem('email');
				localStorage.setItem('token', data.datos.token);
				localStorage.setItem('email', data.datos.row.user_email);
				localStorage.removeItem('name');
				localStorage.setItem('name', data.datos.row.user_name);
				token=data.datos.token;
				email=data.datos.row.user_email;
				name=data.datos.row.user_name;     
				$.mobile.changePage("#main");
				is_logged_in();
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
});