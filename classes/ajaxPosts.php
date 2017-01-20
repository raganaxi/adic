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
	$table = new address;
    $table->setUser_id($_SESSION['iduser']);
	$datos=  $table->getAddress();
    $datos2=array_chunk($datos, $requestData['length']);
    $json = array($datos);
	$json_data = array(
        "draw" => intval($requestData['draw']),
        "recordsTotal"=> count($datos),
        "recordsFiltered"   => count($datos),
          "aaData"=>$datos,
        	);


    /*       $json_data = array(
                "draw"              => intval($requestData['draw']),
                "recordsTotal"      => intval($filter ? $sqlsl->num_rows :$sqlTotal->num_rows),
              
                "recordsFiltered"   => intval( $filter ? $sqlsl->num_rows :$sqlTotal->num_rows),
               $data

            );*/
error_log(print_r($json_data,true));
echo json_encode($json_data);  
}
/*"recordsFiltered"   => intval($filter ? count($data) : $sqlTotal->num_rows),*/
if (isset($_POST['direccion'])) {
     $setDir = new address;
     $setDir->setDireccion($_POST['dir']);
     $setDir->setColonia($_POST['col']);
     $setDir->setMunicipio($_POST['mun']);
     $setDir->setEstado($_POST['est']);
     $setDir->setPais($_POST['pais']);
     $setDir->setCp($_POST['cp']);
     $setDir->setLat($_POST['lat']);
     $setDir->setLong($_POST['lon']);
     $setDir->setUser_id($_SESSION['iduser']);
     echo  $setDir->setAddress();
}
?>
