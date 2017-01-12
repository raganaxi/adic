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
echo $origin.$action;























?>
