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

$mensaje="";
$error="no_error";
$continuar="no_ok";
$datos="";
$action="";

$return = json_encode(array('continuar' => $continuar,'error'=>$error,'mensaje'=> $mensaje,'datos'=>$datos),JSON_FORCE_OBJECT );
header('Content-type: application/json; charset=utf-8');
echo $return;



?>