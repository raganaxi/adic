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

use pdomysql AS pdomysql;
use user AS user;
use posts AS posts;

$mensaje="";
$error="no_error";
$continuar="no_ok";
$datos="";
$action="";

if (is_ajax()){
	if ($action!="") {
		

	}else{
		$continuar="no_ok";
		$mensaje="no hay accion";
	}
	$return = json_encode(array('continuar' => $continuar,'error'=>$error,'mensaje'=> $mensaje,'datos'=>$datos),JSON_FORCE_OBJECT );
	header('Content-type: application/json; charset=utf-8');
	echo $return;
}
function is_ajax() {
	return true;/*isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';*/
}



?>