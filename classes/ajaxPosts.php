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
  //error_log(print_r($requestData,true));
  $table = new address;
  $table->setUser_id($_SESSION['iduser']);
  $datos=  $table->getAddress();
  $datos2=array_chunk($datos, $requestData['length']);
  $json_data = array(
    "draw" => intval($requestData['draw']),
    "recordsTotal"=> count($datos),
    "recordsFiltered"   => count($datos),
    "aaData"=>$datos2[$requestData['start']/$requestData['length']],
    "datPart"=>$datos2,
  );
//error_log(print_r($json_data,true));
echo json_encode($json_data);  
}
if (isset($_POST['direccion'])) {
     $setDir = new address;
  if ($_POST['direccion']==3) {
    $setDir->setIdaddress($_POST['idAdd']);
    $setDir->setBandera($_POST['status']);
    echo $setDir->deleteAddress();
  }else{
     $setDir->setDireccion($_POST['dir']);
     $setDir->setColonia($_POST['col']);
     $setDir->setMunicipio($_POST['mun']);
     $setDir->setEstado($_POST['est']);
     $setDir->setPais($_POST['pais']);
     $setDir->setCp($_POST['cp']);
     $setDir->setLat($_POST['lat']);
     $setDir->setLong($_POST['lon']);
     $setDir->setUser_id($_SESSION['iduser']);
  if ($_POST['direccion']==1) {
     echo  $setDir->setAddress();
  }
  if ($_POST['direccion']==0) {
    $setDir->setIdaddress($_POST['idAdd']);
     echo $setDir->updateAddress();
  }
}
  }
?>
