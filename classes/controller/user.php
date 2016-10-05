<?php

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;


class user
{
	/*
	#Registro de usuarios

	*/
	public function register($mail, $pass, $r_type){
		$consulta = 'call register_user("'.$mail.'", "'.$pass.'",  "'.$r_type.'")';
        error_log($consulta);
        $PDOMYSQL = new PDOMYSQL;
        $result =  $PDOMYSQL->consulta($consulta);
        if($result){
        	return $result;
        }else{
        	return $result;
        }
    }

    public function login($mail, $pass){

		$consulta = 'SELECT * FROM user where username = "'.$mail.'" and pass = "'.$pass.'"';
		error_log($consulta);
        $PDOMYSQL = new PDOMYSQL;
        $result =  $PDOMYSQL->consulta($consulta);
       	return $result;
    }

}
?>
