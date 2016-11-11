<?php
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
		$_SESSION['user'] = $resultl[0]['username'];
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

//Logout
if (isset($_POST['logout'])) {
	session_destroy();
}

//Editar Perfil
if (isset($_POST['editProfile'])) {
    $_POST['file'] = isset($_POST['file'])?  $_POST['file'] : null;
    $result = user::editProfile($_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['file'], $_SESSION['iduser']);
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
    $result = user::registerSoc($_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['pass'] = null, 'email', $_POST['img'] = null, $_POST['negocio']);
    
    $resultl = user::login($_POST['mail'], $_POST['pass']);
	if (!empty($result)) {
		$_SESSION['user'] = isset($resultl[0]['username'])? $resultl[0]['username'] : null ;
		$_SESSION['rol'] =  isset($resultl[0]['role'])? $resultl[0]['role'] : null ;
		$_SESSION['iduser'] = isset($resultl[0]['iduser'])? $resultl[0]['iduser'] : null ;
	}
    
	echo json_encode($result[0]);
}
/* codigo nuevo */
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
if (is_ajax()){
	if ($action!="") { /*Checks if action value exists*/
		
		switch($action) { /*//Switch case for value of action*/
			case 'sesion':sesion_function();break;
			case 'login': login_function(); break;
			case 'logout': logout_function();break;

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
?>
