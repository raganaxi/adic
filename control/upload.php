<?php


require_once('../classes/autoloader.php');
require_once('../config.php');


use pdomysql AS pdomysql;
use user AS user;


$modulo="";

$action="";
$iduser="x";
if (isset($_POST['action'])) {
	$action=$_POST['action'];
}
if (isset($_POST['modulo'])) {
	$modulo=$_POST['modulo'];
}
if (isset($_POST['iduser'])) {
	$iduser=$_POST['iduser'];
}
error_log("modulo".$modulo);

switch($modulo) {
	case 'post': post_function();break;
	case 'profileImage': profile_function(); break;
	default: echo 0; die;
}

function post_function(){
	global $action;

	switch($action) {
		case 'a': create_post_function();break;

		default: echo 0;die;
	}
}
function profile_function(){
	global $action;

	switch($action) {
		case 'a': update_profile_function();break;

		default: echo 0;die;
	}
	
}
function update_profile_function(){
	global $iduser;
	try{
		$directory = "../imagenes_/profPicture/";
		/*if (!file_exists($directory)) {
			mkdir($directory, 0777,true);
		}
		if (!file_exists($directory.$iduser)) {
			mkdir($directory.$iduser, 0777,true);
		}*/
		$nombreArchivo=isset($_FILES['fileImage']['name']) ?$_FILES['fileImage']['name']: null;
		$nombreTemporal=isset($_FILES['fileImage']['tmp_name'])?$_FILES['fileImage']['tmp_name']:null;

		$nombreArchivo=$iduser."_".mktime()."_"str_replace(" ", "_", $nombreArchivo);

		$rutaArchivo=$directory.$nombreArchivo;

		move_uploaded_file($nombreTemporal,$rutaArchivo);

		$img=$nombreArchivo;
		$result = user::updateProfPicture($img,$iduser);
		echo json_encode($result);
	}
	catch(Exception $e){
		error_log($e);
		return 0;
	}
	finally{
		return;
		die;
	}
}
function create_post_function(){
	global $iduser;
	try{
		$directory = "../imagenes_/post/";
		/*if (!file_exists($directory)) {
			mkdir($directory, 0777,true);
		}
		if (!file_exists($directory.$iduser)) {
			mkdir($directory.$iduser, 0777,true);
		}*/
		$nombreArchivo=isset($_FILES['file']['name']) ?$_FILES['file']['name']: null;
		$nombreTemporal=isset($_FILES['file']['tmp_name'])?$_FILES['file']['tmp_name']:null;

		$nombreArchivo=$iduser."_".str_replace(" ", "_", $nombreArchivo);

		$rutaArchivo=$directory.$nombreArchivo;

		move_uploaded_file($nombreTemporal,$rutaArchivo);

		$img=$nombreArchivo;
		$result = user::regPost($_POST['title'], $_POST['description'], $_POST['date'], $iduser, $img);
		echo json_encode($result);
	}
	catch(Exception $e){
		error_log($e);
		return 0;
	}
	finally{
		return;
		die;
	}
	

}












?>