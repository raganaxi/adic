<?php

//invocacion de clases
use pdomysql AS pdomysql;
use posts AS posts;


class posts
{
    public static function search($terms){
        $consulta = 'SELECT * FROM post where title LIKE "%'.$terms.'%"';
        $PDOMYSQL = new PDOMYSQL;
        $result =  $PDOMYSQL->consulta($consulta);
        return $result;
    } 

    public static function regCat($name, $description, $cateSup = null){
        $consulta = 'CALL regCat("'.$name.'","'.$description.'","'.$cateSup.'");';
        error_log($consulta);
        $PDOMYSQL = new PDOMYSQL;
        $result =  $PDOMYSQL->consulta($consulta);
        return $result;
    }    

}
?>
