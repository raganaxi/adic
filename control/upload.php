<?php


require_once('../classes/autoloader.php');
require_once('../config.php');


use pdomysql AS pdomysql;
use user AS user;



$iduser="x";
if (isset($_POST['iduser'])) {
	$iduser=$_POST['iduser'];
}
$directory = "../imagenes_/post/";
if (!file_exists($directory)) {
	mkdir($directory, 0777,true);
}
if (!file_exists($directory.$iduser)) {
	mkdir($directory.$iduser, 0777,true);
}

$nombreArchivo=isset($_FILES['file']['name']) ?$_FILES['file']['name']: null;
$nombreTemporal=isset($_FILES['file']['tmp_name'])?$_FILES['file']['tmp_name']:null;

$nombreArchivo=$iduser."/".str_replace(" ", "_", $nombreArchivo);

$rutaArchivo=$directory.$nombreArchivo;

move_uploaded_file($nombreTemporal,$rutaArchivo);

	$img=$nombreArchivo;


	$result = user::regPost($_POST['title'], $_POST['description'], $_POST['date'], $iduser, $img);
	echo json_encode($result);

?>