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
	$result = posts::regCat($_POST['name'], $_POST['desc']);
	echo json_encode($result);
}

//listar categorias
if (isset($_POST['get_Category'])) {
	$result = posts::getCategory();
	echo json_encode($result);
}

//filtrar publicaciones por dia
if (isset($_POST['postsDay'])) {
	$_SESSION['date'] = $_POST['date'];
	$result = posts::search(null, $_SESSION['date']);
	echo json_encode($result);
}
if (isset($_POST['tableDir'])) {
	error_log(print_r($_SESSION['date'],true));
	echo 'holaa';

}

?>
