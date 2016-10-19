<?php

//invocacion de clases
use pdomysql AS pdomysql;
use posts AS posts;


class posts
{
	public static function getDayofWeek($day){
		switch ($day) {
              case 1:
                $day = 'Lunes';
                break;
              case 2:
                $day = 'Martes';
                break;
              case 3:
                $day = 'Miercoles';
                break;
              case 4:
                $day = 'Jueves';
                break;
              case 5:
                $day = 'Viernes';
                break;
              case 6:
                $day = 'Sabado';
                break;
              case 7:
                $day = 'Domingo';
                break;
              
              default:
                $day = 'Error'
                break;
            }
    }    

}
?>
