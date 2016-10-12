<?php

//invocacion de clases
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
    
    public static function registerSoc($name, $phone, $mail, $pass, $r_type){
		$consulta = 'call register_soc("'.$name.'","'.$phone.'","'.$mail.'", "'.$pass.'",  "'.$r_type.'")';
        error_log($consulta);
        $PDOMYSQL = new PDOMYSQL;
        $result =  $PDOMYSQL->consulta($consulta);
        return $result;
    }

    public static function login($mail, $pass){
		$consulta = 'SELECT * FROM user where username = "'.$mail.'" and pass = "'.$pass.'"';
		error_log($consulta);
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
    

}
?>
