<?php
$origen="";
if (isset($_SERVER['HTTP_ORIGIN'])) {
	$origen=$_SERVER['HTTP_ORIGIN'];
}
else{
	$origen="*";
}

header("Access-Control-Allow-Origin:".$origen);
require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

//Registrar  usuario
if (isset($_POST['reg_user'])) {
//	$_POST['pass'] = sha1($_POST['pass']);
	$result = user::register($_POST['mail'], $_POST['pass'], "email");

	$resultl = user::login($_POST['mail'], $_POST['pass']);
	if (!empty($result)) {
		$_SESSION['userproble'] = $resultl[0]['username'];
		$_SESSION['rol'] = $resultl[0]['role'];
		$_SESSION['iduser'] = $resultl[0]['iduser'];
	}
	echo json_encode($result[0]);
}
//Login
if (isset($_POST['login_user'])) {
//	$_POST['pass'] = isset($_POST['pass'])? $_POST['pass'] : 'admin123';
//    $_POST['pass'] = sha1($_POST['pass']);
	$result = user::login($_POST['mail'], $_POST['pass']);
	if (!empty($result)) {
		$_SESSION['user'] = $result[0]['username'];
		$_SESSION['rol'] = $result[0]['role'];
		$_SESSION['iduser'] = $result[0]['iduser'];
		echo json_encode($result);
	}else{
		echo 0;
	}
}

if (isset($_POST['activate_soc']) && $_POST['activate_soc'] == 1) {
	$result = user::activateUser($_POST['iduser']);
	if (!empty($result)) {
		echo json_encode($result);
	}else{
		echo 0;
	}
}

if (isset($_POST['deactivate_soc']) && $_POST['deactivate_soc'] == 1) {
	$result = user::deactivateUser($_POST['iduser']);
	if (!empty($result)) {
		echo json_encode($result);
	}else{
		echo 0;
	}
}

if (isset($_POST['change_access']) && $_POST['change_access'] == 1) {
  $result = user::changeAccess($_POST['iduser'], $_POST['username'], $_POST['oldPass'], $_POST['newPass'] );
	if (!empty($result)) {
		echo json_encode($result);
	}else{
		echo 0;
	}
}

//Logout en desuso
if (isset($_POST['logout'])) {
	session_destroy();
}

//Editar Perfil
if (isset($_POST['editProfile'])) {
	//$_POST['file'] = isset($_POST['file'])?  $_POST['file'] : null;
	$result = user::editProfileData($_POST['name'], $_POST['number'], $_POST['negocio'], $_SESSION['iduser']);
	echo json_encode($result);
}

//Registrar publicacion
if (isset($_POST['create_Post'])) {
	$_POST['file'] = 'images/posts/'.$_POST['file'];
	$result = user::regPost($_POST['title'], $_POST['description'], $_POST['date'], $_SESSION['iduser'], $_POST['category'], $_POST['file']);
	echo json_encode($result);
}


//Registrar socio
if (isset($_POST['reg_soc'])) {
 //  $_POST['pass'] = isset($_POST['pass'])? $_POST['pass'] : 'admin123';
//   $_POST['pass'] = sha1($_POST['pass']);
  //  $_POST['img'] = 'images/profPicture/'.$_POST['img'];
	$result = user::registerSoc($_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['pass'] = null, $_POST['typeReg'], $_POST['img'] = "01.png", $_POST['negocio']);
	//$resultl = user::login($_POST['mail'], $_POST['pass']);
	//if (!empty($result)) {
		// $_SESSION['user'] = isset($resultl[0]['username'])? $resultl[0]['username'] : null ;
		// $_SESSION['rol'] =  isset($resultl[0]['role'])? $resultl[0]['role'] : null ;
		// $_SESSION['iduser'] = isset($resultl[0]['iduser'])? $resultl[0]['iduser'] : null ;
	//}
  echo json_encode($result[0]);
}

/* codigo nuevo */
/*
$mensaje="";
$error="no_error";
$continuar="no_ok";
$datos="";
$action="";

switch($_SERVER['REQUEST_METHOD'])
{
	case 'GET':
	if (isset($_GET["action"]) && !empty($_GET["action"])) {
		$action=$_GET["action"];
	}
	break;
	case 'POST':
	if (isset($_POST["action"]) && !empty($_POST["action"])) {
		$action=$_POST["action"];
	}
	break;
	default:
}*/
/* dependiendo de la accion es la funcion que se ejecutara */
/*
if (is_ajax()){
	if ($action!="") { //Checks if action value exists

		switch($action) { //Switch case for value of action
			case 'sesion': sesion_function();break;
			case 'loginU': login_function(); break;
			case 'logout': logout_function();break;
			case 'registerU': register_user();break;
			case 'getPost': getPost_function();break;

		}
	}else{
		$continuar="no_ok";
		$mensaje="no hay accion";
	}
	$return = json_encode(array('continuar' => $continuar,'error'=>$error,'mensaje'=> $mensaje,'datos'=>$datos),JSON_FORCE_OBJECT );
	header('Content-type: application/json; charset=utf-8');
	echo $return;
}*/
/*function is_ajax() {
	return true;//isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}*/
/*function register_user(){
	global $db_con;
	global $continuar;
	global $error;
	global $datos;
	global $mensaje;
	$logUser="";
	$logPass="";
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':

		if (isset($_GET["mail"]) && !empty($_GET["mail"])) {
			$logUser=$_GET["mail"];
		}
		if (isset($_GET["pass"]) && !empty($_GET["pass"])) {
			$logPass=$_GET["pass"];
		}
		break;
		case 'POST':
		if (isset($_POST["mail"]) && !empty($_POST["mail"])) {
			$logUser=$_POST["mail"];
		}
		if (isset($_POST["pass"]) && !empty($_POST["pass"])) {
			$logPass=$_POST["pass"];
		}
		break;
		default:
	}

	if($logUser!=""){
		$logUser = trim($logUser);
		$logPass = trim($logPass);
		$register_result = user::register($logUser, $logPass, "email");
		$result = user::login($logUser, $logPass);
		if (!empty($result)) {
			$continuar ="ok"; //login on
			$datos['row']=$result;
			$newToken=	user::obtenToken512($logUser,$result[0]['iduser'],"localhost","prueba");
			if($newToken){
				$datos['token']=$newToken;
			}
		}
		else{
			$continuar="no_ok";
			$error="no_ok";
			$mensaje="email o contraseña no existen "; // wrong details
		}
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$mensaje="favor de revisar los campos requeridos";

	}
}*/
/*function login_function(){
	global $db_con;
	global $continuar;
	global $error;
	global $datos;
	global $mensaje;
	$logUser="";
	$logPass="";
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':

		if (isset($_GET["logUser"]) && !empty($_GET["logUser"])) {
			$logUser=$_GET["logUser"];
		}
		if (isset($_GET["logPass"]) && !empty($_GET["logPass"])) {
			$logPass=$_GET["logPass"];
		}
		break;
		case 'POST':
		if (isset($_POST["logUser"]) && !empty($_POST["logUser"])) {
			$logUser=$_POST["logUser"];
		}
		if (isset($_POST["logPass"]) && !empty($_POST["logPass"])) {
			$logPass=$_POST["logPass"];
		}
		break;
		default:
	}
	if($logUser!=""){
		$logUser = trim($logUser);
		$logPass = trim($logPass);
		//$logPass = md5($logPass);
		$result = user::login($logUser, $logPass);
		if (!empty($result)) {
			$continuar ="ok"; //login on
			$datos['row']=$result;
			$newToken=	user::obtenToken512($logUser,$result[0]['iduser'],"localhost","prueba");
			if($newToken){
				$datos['token']=$newToken;
			}
		}
		else{
			$continuar="no_ok";
			$error="no_ok";
			$mensaje="email o contraseña no existen "; // wrong details
		}
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$mensaje="favor de revisar los campos requeridos";

	}
}*/






/* funcion que sirve para verificar el token de session emula el uso de la session en php */
// function sesion_function(){
// 	global $continuar;
// 	global $error;
// 	global $datos;
// 	global $mensaje;
// 	$user_email="";
// 	$token="";
// 	switch($_SERVER['REQUEST_METHOD'])
// 	{
// 		case 'GET':
//
// 		if (isset($_GET["token"]) && !empty($_GET["token"])) {
// 			$token=$_GET["token"];
// 		}
// 		break;
// 		case 'POST':
// 		if (isset($_POST["token"]) && !empty($_POST["token"])) {
// 			$token=$_POST["token"];
// 		}
// 		break;
// 		default:
// 	}
// 	if ($token!="") {
// 		$validate=user::tokenValidate($token);
// 		if ($validate) {
// 			$continuar="ok";
// 			$error="no_error";
// 			return;
// 		}
// 	}
// 	$continuar="no_ok";
// 	$error="no_error";
// 	$mensaje="no ha iniciado session";
// 	return;
// }

/* logout function */
/*
function logout_function(){
	global $db_con;
	global $continuar;
	global $error;
	global $datos;
	global $mensaje;
	$user_email="";
	$token="";
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':

		if (isset($_GET["token"]) && !empty($_GET["token"])) {
			$token=$_GET["token"];
		}
		break;
		case 'POST':
		if (isset($_POST["token"]) && !empty($_POST["token"])) {
			$token=$_POST["token"];
		}
		break;
		default:
	}
	if ($token!="") {
		$validate=user::tokenValidateDelete($token);
		$datos=$validate;
		$continuar="ok";
		$error="no_error";
		return;


	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$mensaje="token vacio";
	}
}
function getPost_function(){
	global $db_con;
	global $continuar;
	global $error;
	global $datos;
	global $mensaje;

	$post=user::getPost();
	if (!empty($post)){
		$datos=$post;
		$continuar="ok";
		$error="no_error";
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$datos=$post;
		$mensaje="ocurrio algo";
	}

}*/


/* fin*/
























?>
