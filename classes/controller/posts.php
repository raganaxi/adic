<?php

//invocacion de clases
use pdomysql AS pdomysql;
use posts AS posts;


class posts
{
  public static function search($terms = null, $date = null){
    if (isset($_SESSION['date'])){
      $date = $_SESSION['date'];
    }else{
      $date = isset($date)? $date : date('Y-m-d');
    }


    $consulta = 'SELECT post.*,category.nombre as categoria, user_data.name as user_name, user_data.img as user_pic FROM post INNER JOIN user on user.iduser = post.userid INNER JOIN user_data ON user_data.user_id = post.userid INNER JOIN category on post.categoryid = category.idcategory where (post.title LIKE "%'.$terms.'%" or category.nombre LIKE "%'.$terms.'%") and date ="'.$date.'"  order by date desc';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function regCat($name, $description){
    $consulta = 'CALL regCat("'.$name.'","'.$description.'");';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function getCategory(){
    $consulta = 'SELECT * FROM category';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function getCurrentDay($date){
    $date = date('N', $date);
    switch ($date) {
      case '1':
      return 'Lunes';
      break;
      case '2':
      return 'Martes';
      break;
      case '3':
      return 'Miercoles';
      break;
      case '4':
      return 'Jueves';
      break;
      case '5':
      return 'Viernes';
      break;
      case '6':
      return 'Sabado';
      break;
      case '7':
      return 'Domingo';
      break;
      default:
      return 'error';
      break;
    }
  }

  public static function uploadFile(){

   if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size > 2097152) {
     $errors[]='File size must be excately 2 MB';
   }

   if(empty($errors)==true) {
     move_uploaded_file($file_tmp,"images/".$file_name);
     echo "Success";
   }
   else{
     error_log(print_r($errors, true));
   }
 }

 return $result;
}

public static function getPost($categoria,$fecha){
  $db_con = new PDOMYSQL;
  $consulta = 'SELECT post.*,category.nombre as categoria,
  user_data.name as user_name, user_data.img as user_pic FROM post
  INNER JOIN user on user.iduser = post.userid INNER JOIN user_data ON user_data.user_id = post.userid
  INNER JOIN category on user_data.category_id = category.idcategory where date = ';
  $result="";
  if ($categoria=="") {
    if ($fecha=="") {
      $consulta.="CAST(CONVERT_TZ(now(),'+00:00','-06:00') as date) order by date desc";
      $result =  $db_con->consulta($consulta);

    }
    else{
      $consulta.=' ? order by date desc';
      $parametros = array($fecha);
      $result =  $db_con->consultaSegura($consulta,$parametros);

    }
  }else{
    if ($fecha=="") {
      $consulta.=" CAST(CONVERT_TZ(now(),'+00:00','-06:00') as date) and category.idcategory = ? order by date desc";
      $parametros = array($categoria);
      $result =  $db_con->consultaSegura($consulta,$parametros);

    }
    else{
      $consulta.=' ? and category.idcategory = ? order by date desc';
      $parametros = array($fecha,$categoria);
      $result =  $db_con->consultaSegura($consulta,$parametros);

    }
  }
  return $result;
}
public static function getNegocios($categoria){

  $db_con = new PDOMYSQL;
  $consulta = "SELECT IF(negocio is null, 'Sin Nombre', negocio) AS negocio,iduser as userid,username,role,active,user_data.name as nombre,user_data.number, case img when NULL then 'default.png' when '' then 'default.png' else img end as userpic, category.nombre as categoria , category.idcategory as categoriaid FROM user INNER JOIN user_data ON user_data.user_id = user.iduser INNER JOIN category on category.idcategory = user_data.category_id WHERE user.role = ? and active = 1 ";
  $socio='socio';
  $parametros = array($socio);
  if($categoria!=""){
    $consulta.=" and user_data.category_id = ?";
    $parametros = array($socio,$categoria);
    //var_dump($consulta);
  }

  $result =  $db_con->consultaSegura($consulta,$parametros);


  return $result;
}

public static function getAddress($categoria){
  $db_con = new PDOMYSQL;
  $consulta = "SELECT iduser as userid, if( address.calle is NULL,'', address.calle) as calle, if( address.numero is NULL,'',address.numero) as numero, if( address.municipio is NULL,'', address.municipio)  as municipio, if( address.estado is NULL,'', address.estado) as estado, if( address.pais is NULL,'', address.pais) as pais, if( address.cp is NULL,'', address.cp) as cp, if( address.lat is NULL,'', address.lat) as latitud, if( address.long is NULL,'', address.long) as longitud, if( address.idaddress is NULL,'', address.idaddress) as idaddress FROM user INNER JOIN user_data ON user_data.user_id = user.iduser INNER JOIN category on category.idcategory = user_data.category_id inner JOIN address on address.user_id = user_data.user_id WHERE user.role = ?";
  $socio='socio';
  $parametros = array($socio);
  if($categoria!=""){
    $consulta.=" and user_data.category_id = ? ";
    $parametros = array($socio,$categoria);
    //var_dump($consulta);
  }
  $consulta.=" order by userid";

  $result =  $db_con->consultaSegura($consulta,$parametros);


  return $result;
}

public static function searchInput($input){
  $db_con = new PDOMYSQL;
  /*SELECT post.*
  ,category.nombre as categoria
  , user_data.name as user_name
  , user_data.img as user_pic
  FROM post
  INNER JOIN user on user.iduser = post.userid
  INNER JOIN user_data ON user_data.user_id = post.userid
  INNER JOIN category on post.categoryid = category.idcategory
  where (post.title LIKE '%a%' or category.nombre LIKE '%a%')
  and date >= CAST(CONVERT_TZ(now(),'+00:00','-06:00') as date)
  order by date desc;*/
  $consulta=  "SELECT post.*,category.nombre as categoria, user_data.name as user_name, user_data.img as user_pic FROM post INNER JOIN user on user.iduser = post.userid INNER JOIN user_data ON user_data.user_id = post.userid INNER JOIN category on post.categoryid = category.idcategory where (post.title LIKE ? or category.nombre LIKE ?) and date >= CAST(CONVERT_TZ(now(),'+00:00','-06:00') as date)  order by date desc";
  $input='%'.$input.'%';
  $parametros = array($input,$input);
  $result =  $db_con->consultaSegura($consulta,$parametros);
  return $result;

}


/*fin de la clase*/
}
?>
