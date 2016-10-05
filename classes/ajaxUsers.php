<?php
require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

if (isset($_POST['reg_user'])) {
	$_POST['pass'] = sha1($_POST['pass']);
	$result = user::register($_POST['mail'], $_POST['pass'], "email");


	$resultl = user::login($_POST['mail'], $_POST['pass']);
	if (!empty($result)) {
		$_SESSION['user'] = $resultl[0]['username'];
		$_SESSION['rol'] = $resultl[0]['role'];
	}
	echo json_encode($result[0]);
}

if (isset($_POST['login_user'])) {
	$_POST['pass'] = sha1($_POST['pass']);
	$result = user::login($_POST['mail'], $_POST['pass']);
	if (!empty($result)) {
		$_SESSION['user'] = $result[0]['username'];
		error_log($_SESSION['user'] );
		$_SESSION['rol'] = $result[0]['role'];
		error_log($_SESSION['rol']);
		echo json_encode($result);
	}else{
		echo 0;
	}
}



if (isset($_POST['logout'])) {
	session_destroy();
}

?>
