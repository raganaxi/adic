<?php

//invocacion de clases
use pdomysql AS pdomysql;
use posts AS posts;


class posts
{
    public static function search($terms){
        $consulta = 'SELECT * FROM post where title LIKE "%'.$terms.'%"';
        error_log($consulta);
        $PDOMYSQL = new PDOMYSQL;
        $result =  $PDOMYSQL->consulta($consulta);
        return $result;
    }    

}
?>
