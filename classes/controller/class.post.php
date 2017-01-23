<?php

use pdomysql AS pdomysql;
use post AS post; 

class post{
private $idpost = null;
private $title= null;
private $description= null;
private $date= null;
private $userid= null;
private $categoryid= null;
private $image= null;

public function __construct($data=array()){
       $idpost= isset($data['idpost']) ? $data['idpost'] : null;
       $title= isset($data['title']) ? $data['title'] : null;
       $description= isset($data['description']) ? $data['description'] : null;
       $date= isset($data['date']) ? $data['date'] : null;
       $userid= isset($data['userid']) ? $data['userid'] : null;
       $categoryid= isset($data['categoryid']) ? $data['categoryid'] : null;
       $image= isset($data['image']) ? $data['image'] : null;

}
public function getPost(){
    	$consulta ="SELECT * from post WHERE userid = ? and status <> 3 ";
    	$db_con= new PDOMYSQL;
        $parametros = array($this->userid);
        $result=$db_con->consultaSeguraIndex($consulta,$parametros);
        return $result;
}
public function setPost(){
        $consulta = "INSERT INTO post (title,description,`date`, userid,image) values(?,?,?,?,?)";
        $parametros=array($this->title,$this->description,$this->date,$this->userid,$this->image);
        $db_con=new PDOMYSQL;
        $result=$db_con->consultaSegura($consulta,$parametros);
  
      	    return true;

}
public function updatePost(){
    	$consulta="UPDATE post SET title =?, description = ?, date = ?, userid = ?, categoryid = ?, image = ? WHERE idpost= ?";
    	$parametros=array($this->title,$this->description,$this->date,$this->userid,$this->categoryid,$this->image,$this->idpost);
    	$db_con=new PDOMYSQL;
    	$result=$db_con->consultaSegura($consulta,$parametros);
    	if(!empty($result)){
      	    return true;
        }else{
      	    return false;
        }
}
public function deletePost(){
    	$consulta="UPDATE post SET bandera =? WHERE idpost = ?";
    	$parametros=array(0,$this->idpost);
    	$db_con=new PDOMYSQL;
    	$result=$db_con->consultaSegura($consulta,$parametros);
    	if(!empty($result)){
      	    return true;
        }else{
      	    return false;
        }
    }




public function setIdpost($idpost)
    
    {
        $this->idpost=$idpost;
    }
    
    public function getIdpost()
    
    { 
        return $this->idpost;
    } 

    public function setTitle($title)
    
    {
        $this->title=$title;
    }
    
    public function getTitle()
    
    { 
        return $this->title;
    } 

    public function setDescription($description)
    
    {
        $this->description=$description;
    }
    

    public function getDescription()
    
    { 
        return $this->description;
    } 

    public function setDate($date)
    
    {
        $this->date=$date;
    }
    
    public function getDate()
    
    { 
        return $this->date;
    } 

    public function setUserid($userid)
    
    {
        $this->userid=$userid;
    }

    public function getUserid()
    
    { 
        return $this->userid;
    } 

    public function setCategoryid($categoryid)
    
    {
        $this->categoryid=$categoryid;
    }
    
    public function getCategoryid()
    
    { 
        return $this->categoryid;
    } 

    public function setImage($image)
    
    {
        $this->image=$image;
    }
    
    public function getImage()
    
    { 
        return $image->image;
    } 

}
?>