<?php
require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

//Registrar  usuario
if (isset($_POST['reg_user'])) {
	$_POST['pass'] = sha1($_POST['pass']);
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
	$_POST['pass'] = sha1($_POST['pass']);
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

?>
