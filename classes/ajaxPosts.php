<?php
require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use posts AS posts;

//Buscar posts
if (isset($_POST['search_post'])) {
	$result = posts::search($_POST['search_terms']);
	echo json_encode($result);
}
//Registrar  categorias
if (isset($_POST['register_Cat'])) {
	$result = posts::search($_POST['search_terms']);
	echo json_encode($result);
}


?>
