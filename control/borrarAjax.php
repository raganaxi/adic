<?php 
$iduser="x";
if (isset($_GET['iduser'])) {
    $iduser=$_GET['iduser'];
}
if (isset($_GET['iduser'])) {
    $iduser=$_POST['iduser'];
}

$carpetaAdjunta="../images/profPicture/".$iduser."/";
if($_SERVER['REQUEST_METHOD']=="DELETE"){
			parse_str(file_get_contents("php://input"),$datosDELETE);
			$key= $datosDELETE['key'];
			unlink($carpetaAdjunta.$key);
			
			echo 0;
}
?>