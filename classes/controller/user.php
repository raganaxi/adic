<?php

/*invocacion de clases*/
use pdomysql AS pdomysql;
use user AS user;


class user
{
	/*
	#Registro de usuarios

	*/
	public static function register($mail, $pass, $r_type){
		$consulta = 'call register_user("'.$mail.'", "'.$pass.'",  "'.$r_type.'")';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function registerSoc($name, $phone, $mail, $pass, $r_type, $img, $negocio){
    $consulta = 'call register_soc("'.$name.'","'.$phone.'","'.$mail.'", "'.user::randomPassword().'",  "'.$r_type.'",  "'.$img.'",  "'.$negocio.'")';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function login($mail, $pass){


    $consulta = "SELECT * FROM user where username = ? and pass = ? and active = '1'";
    $parametros = array($mail,$pass);
    error_log($consulta);
    $db_con = new PDOMYSQL;
    $result =  $db_con->consultaSegura($consulta,$parametros);
    return $result;
  }
  
  
  public static function getPost(){
    $date = isset($_SESSION['date'])? $_SESSION['date'] : date('Y-m-d');
    $consulta = 'SELECT post.*,category.nombre as categoria, user_data.name as user_name, user_data.img as user_pic FROM post INNER JOIN user on user.iduser = post.userid INNER JOIN user_data ON user_data.user_id = post.userid INNER JOIN category on post.categoryid = category.idcategory where date ="'.$date.'" order by date desc';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function regPost($title, $description, $date, $userid, $category, $file){
    $consulta = 'call register_post("'.$title.'", "'.$description.'",  "'.$date.'",  "'.$userid.'",  "'.$category.'",  "'.$file.'")';
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function editProfile($name, $phone, $mail, $image, $user_id){
    $consulta = 'call editProfile("'.$name.'", "'.$phone.'",  "'.$mail.'",  "'.$image.'",  "'.$user_id.'")';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function getProfile($userId){
    $consulta = 'SELECT * FROM user_data where user_id = "'.$userId.'" ';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }


  public static function getSoc(){
    $date = isset($_SESSION['date'])? $_SESSION['date'] : date('Y-m-d');
    $consulta = 'SELECT user.*, user_data.name, user_data.number, user_data.negocio FROM user inner join user_data on user.iduser = user_data.user_id WHERE role ="socio" and active = 0';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); /*remember to declare $pass as an array*/
    $alphaLength = strlen($alphabet) - 1; /*put the length -1 in cache*/
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); /*turn the array into a string*/
  }

  public static function activateUser($user) {
    $consulta = 'Update user set active = 1 where username = "'.$user.'"';
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function tokenValidate($token){
    $consulta ="SELECT * FROM tbl_tokens WHERE tx_token=? and active=1";
    $parametros = array($token);
    error_log($consulta);
    $db_con = new PDOMYSQL;
    $result =  $db_con->consultaSegura($consulta,$parametros);
    if (empty($result)) {
      return false;
    }
    else{
      return true;
    }
  }
  /*obtener un toquen unico ligado al usuario*/
  public static function obtenToken512($email,$id,$ip,$id_dispositivo){
    if ($email==""||$id==""||$ip==""||$id_dispositivo=="") {
      return false;
    }
    $token="";
    for ($i=0; $i < 5; $i++) {
      $tmpToken= openssl_digest($email.Time(), 'sha512');
      $consulta = "SELECT * FROM tbl_tokens WHERE tx_token=?";
      $parametros = array($tmpToken);
      error_log($consulta);
      $db_con = new PDOMYSQL;
      $result =  $db_con->consultaSegura($consulta,$parametros);
      if (empty($result)) {
        $token=$tmpToken;
        break;
      }
    }
    /*verificamos si el token se guardara o devolveremos error*/
    if (strlen($token)>0) {
      $consulta = "INSERT INTO tbl_tokens (tx_token,user_id,creation_date,ip,id_dispositivo,active) values(?,?,now(),?,?,1)";
      $parametros = array($token, $id,$ip, $id_dispositivo);
      error_log($consulta);
      $db_con = new PDOMYSQL;
      $result =  $db_con->consultaSegura($consulta,$parametros);
    }
    else{
      return false;
    }
    return $token;
  }
  public static function tokenValidateDelete($token){  
    $consulta="UPDATE tbl_tokens SET active = 0 WHERE tx_token=?";
    $parametros = array($token);
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consultaSegura($consulta,$parametros);
    return $result;
  }
    public static function getPostUserID($userID){
    /*SELECT post.*
    ,category.nombre as categoria
    ,user_data.name as user_name
    , user_data.img as user_pic 
    FROM post 
    INNER JOIN user 
    on user.iduser = post.userid 
    INNER JOIN user_data 
    ON user_data.user_id = post.userid 
    INNER JOIN category 
    on post.categoryid = category.idcategory 
    where user.iduser = ?
    order by date desc,idpost desc limit 500
    */
    $consulta = 'SELECT post.*'+
    ',category.nombre as categoria'+
    ',user_data.name as user_name'+
    ', user_data.img as user_pic '+
    'FROM post '+
    'INNER JOIN user '+
    'on user.iduser = post.userid '+
    'INNER JOIN user_data '+
    'ON user_data.user_id = post.userid '+
    'INNER JOIN category '+
    'on post.categoryid = category.idcategory '+
    'where user.iduser = ?'+
    'order by date desc,idpost desc limit 500'+
    '';
    $parametros = array($userid);
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consultaSegura($consulta,$userid);
    return $result;
  }

}
?>
