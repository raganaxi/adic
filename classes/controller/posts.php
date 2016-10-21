<?php

//invocacion de clases
use pdomysql AS pdomysql;
use posts AS posts;


class posts
{
    public static function search($terms){
        $consulta = 'SELECT post.*,category.nombre as categoria, user_data.name as user_name FROM post INNER JOIN user on user.iduser = post.userid INNER JOIN user_data ON user_data.user_id = post.userid INNER JOIN category on post.categoryid = category.idcategory  where post.title LIKE "%'.$terms.'%" or category.nombre LIKE "%'.$terms.'%"  order by date desc';
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
          }else{
             print_r($errors);
          }
       }

        return $result;
    }    

}
?>
