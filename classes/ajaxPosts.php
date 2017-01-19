<?php
require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
  use pdomysql AS pdomysql;
  use user AS user;
  use posts AS posts;
  use address AS address;

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
	  $requestData= $_REQUEST;
	 error_log(print_r($requestData,true));
	//error_log(print_r($_SESSION['date'],true));
	$t = new address;
	$datos=  $t->getAddress();
	$json_data = array(
        "draw" => intval($requestData['draw']),
        		 $datos,
        		        "recordsTotal"=> 3,
        		/*"recordsFiltered"   => intval($filter ? count($data) : $sqlTotal->num_rows),*/
                "recordsFiltered"   => 3,
                 'length' => 100
        	);
	           error_log(print_r($json_data,true));
echo json_encode($json_data);  
}
if (isset($_POST['direccion'])) {
     $setDir = new address;
     $setDir->direccion=$_POST['dir'];
     $setDir->colonia=$_POST['col'];
     $setDir->municipio=$_POST['mun'];
     $setDir->estado=$_POST['est'];
     $setDir->pais=$_POST['pais'];
     $setDir->cp=$_POST['cp'];
     $setDir->lat=$_POST['lat'];
     $setDir->long=$_POST['lon'];
     $setDir->setAddress();
     echo "correcto";
}




	

?>
