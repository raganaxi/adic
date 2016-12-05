<?php
$origen="";
if (isset($_SERVER['HTTP_ORIGIN'])) {
	$origen=$_SERVER['HTTP_ORIGIN'];
}
else{
	$origen="*";
}

header("Access-Control-Allow-Origin:".$origen);/*
header("Access-Control-Allow-Origin:".$_SERVER['HTTP_ORIGIN']);*/
header('Access-Control-Allow-Credentials: true');

require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;
use posts AS posts;

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
}
/* dependiendo de la accion es la funcion que se ejecutara */
if (is_ajax()){
	if ($action!="") { /*Checks if action value exists*/
		
		switch($action) { /*//Switch case for value of action*/
			case 'sesion': sesion_function();break;
			case 'loginU': login_function(); break;
			case 'loginFacebook': login_functionf(); break;
			case 'logout': logout_function();break;
			case 'registerU': register_user();break;
			case 'getPost': getPost_function();break;
			case 'getCat': getCat_function();break;
			case 'buscar': buscar_function();break;

		}
	}else{
		$continuar="no_ok";
		$mensaje="no hay accion";
	}
	$return = json_encode(array('continuar' => $continuar,'error'=>$error,'mensaje'=> $mensaje,'datos'=>$datos),JSON_FORCE_OBJECT );
	header('Content-type: application/json; charset=utf-8');
	echo $return;
}
function is_ajax() {
	return true;//isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function register_user(){
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
			$continuar ="ok"; /*login on*/
			$datos['row']=$result;
			$newToken=	user::obtenToken512($logUser,$result[0]['iduser'],"localhost","prueba");
			if($newToken){
				$datos['token']=$newToken;
			}	
		}
		else{
			$continuar="no_ok";
			$error="no_ok";
			$mensaje="email o contraseña no existen "; /* wrong details */
		}		
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$mensaje="favor de revisar los campos requeridos";

	}
}
function login_function(){
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
			$continuar ="ok"; /*login on*/
			$datos['row']=$result;
			$newToken=	user::obtenToken512($logUser,$result[0]['iduser'],"localhost","prueba");
			if($newToken){
				$datos['token']=$newToken;
			}	
		}
		else{
			$continuar="no_ok";
			$error="no_ok";
			$mensaje="email o contraseña no existen "; /* wrong details */
		}		
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$mensaje="favor de revisar los campos requeridos";

	}
}
function login_functionf(){
	global $db_con;
	global $continuar;
	global $error;
	global $datos;
	global $mensaje;
	$logUser="";
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':
		
		if (isset($_GET["logUser"]) && !empty($_GET["logUser"])) {
			$logUser=$_GET["logUser"];
		}
		case 'POST':		
		if (isset($_POST["logUser"]) && !empty($_POST["logUser"])) {
			$logUser=$_POST["logUser"];
		}
		break;
		default:
	}
	if($logUser!=""){
		$logUser = trim($logUser);
		$result = user::loginFacebook($logUser);
		if (!empty($result)) {
			$continuar ="ok"; 
			$datos['row']=$result;
			$newToken=	user::obtenToken512($logUser,$result[0]['iduser'],"localhost","prueba");
			if($newToken){
				$datos['token']=$newToken;
			}	
		}
		else{
			$continuar="no_ok";
			$error="no_ok";
			$mensaje="usuario no registrado con facebook, favor de registrarse";
		}		
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$mensaje="ocurrio un problema inesperado";

	}
}






/* funcion que sirve para verificar el token de session emula el uso de la session en php */
function sesion_function(){
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
		$validate=user::tokenValidate($token);
		if ($validate) {
			$continuar="ok";
			$error="no_error";
			return;
		}
	}
	$continuar="no_ok";
	$error="no_error";
	$mensaje="no ha iniciado session";
	return;
}

/* logout function */
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
	$categoria="";
	$fecha="";
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':
		
		if (isset($_GET["fecha"]) && !empty($_GET["fecha"])) {
			$fecha=$_GET["fecha"];
		}
		if (isset($_GET["categoria"]) && !empty($_GET["categoria"])) {
			$categoria=$_GET["categoria"];
		}
		break;
		case 'POST':
		if (isset($_POST["categoria"]) && !empty($_POST["categoria"])) {
			$categoria=$_POST["categoria"];
		}		
		if (isset($_POST["fecha"]) && !empty($_POST["fecha"])) {
			$fecha=$_POST["fecha"];
		}
		break;
		default:
	}
	$post=posts::getPost($categoria,$fecha);
	
	
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
	
}
function getCat_function(){
	global $db_con;
	global $continuar;
	global $error;
	global $datos;
	global $mensaje;

	$categoria=posts::getCategory();
	
	
	if (!empty($categoria)){
		$datos=$categoria;
		$continuar="ok";
		$error="no_error";
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$datos=$categoria;
		$mensaje="ocurrio algo";
	}
	
}
function buscar_function(){
	global $db_con;
	global $continuar;
	global $error;
	global $datos;
	global $mensaje;
	$input="";
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':
		if (isset($_GET["input"]) && !empty($_GET["input"])) {
			$input=$_GET["input"];
		}
		break;
		case 'POST':	
		if (isset($_POST["input"]) && !empty($_POST["input"])) {
			$input=$_POST["input"];
		}
		break;
		default:
	}
	$result=posts::searchInput($input);
	if (!empty($result)){
		$datos=$result;
		$continuar="ok";
		$error="no_error";
	}
	else{
		$continuar="no_ok";
		$error="no_error";
		$datos=$result;
		$mensaje="esta vacio";
	}
	
}


/* fin*/
























?>
