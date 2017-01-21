<?php

$iduser="x";
if (isset($_GET['iduser'])) {
    $iduser=$_GET['iduser'];
}
if (isset($_GET['iduser'])) {
    $iduser=$_POST['iduser'];
}
$carpetaAdjunta="images/profPicture/".$iduser."/";
if (!file_exists($carpetaAdjunta)) {
    mkdir($carpetaAdjunta, 0777,true);
}

// Contar envían por el plugin
$Imagenes =count(isset($_FILES['profileImage']['name'])?$_FILES['profileImage']['name']:0);

error_log($Imagenes);
$infoImagenesSubidas = array();
for($i = 0; $i < $Imagenes; $i++) {
    error_log($_FILES['profileImage']['name']);
    // El nombre y nombre temporal del archivo que vamos para adjuntar
    $nombreArchivo=isset($_FILES['profileImage']['name'][$i])?$_FILES['profileImage']['name'][$i]:null;
    error_log($nombreArchivo);
    $nombreTemporal=isset($_FILES['profileImage']['tmp_name'][$i])?$_FILES['profileImage']['tmp_name'][$i]:null;
    error_log($nombreTemporal);
    
    $rutaArchivo=$carpetaAdjunta.$nombreArchivo;
    
    move_uploaded_file($nombreTemporal,$rutaArchivo);
    
    $infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px","url"=>"borrarAjax.php","key"=>$nombreArchivo,'iduser'=>$iduser);
    $ImagenesSubidas[$i]="<img  height='120px'  src='$rutaArchivo' class='file-preview-image'>";
    }
$arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,
             "initialPreview"=>$ImagenesSubidas);
echo json_encode($arr);
?>