<?php
use pdomysql AS pdomysql;
use Address AS Address;
//require_once(__DIR__ .'/controller/pdomysql.php');

class address{

	public $idaddress=null;
	public $direccion=null;
	//private $numero=null;
	public $colonia=null;
	public $municipio=null;
	public $estado=null;
	public $pais=null;
	public $cp=null;
	public $lat=null;
    public $long=null;
    public $user_id=null;


//colonia,municipio,estado,pais,cp,lat,long,user_id
	public function __construct($data=array()){
        $idaddress = isset($data['idaddress']) ? $data['idaddress'] : null;
        $direccion = isset($data['direccion']) ? $data['direccion'] : null;
       // $numero = isset($data['numero']) ? $data['numero'] : null;
        $colonia = isset($data['colonia']) ? $data['colonia'] : null;
        $municipio = isset($data['municipio']) ? $data['municipio'] : null;
        $estado = isset($data['estado']) ? $data['estado'] : null;
        $pais = isset($data['pais']) ? $data['pais'] : null;
        $cp = isset($data['cp']) ? $data['cp'] : null;
        $lat = isset($data['lat']) ? $data['lat'] : null;
        $long = isset($data['long']) ? $data['long'] : null;
        $user_id = isset($data['user_id']) ? $data['user_id'] : null;

    }
 
   public function getAddress(){
    	$consulta ="SELECT * from address";
    	$db_con= new PDOMYSQL;
        $parametros = array('');
        $result=$db_con->consultaSegura($consulta,$parametros);
        return $result;
    }
  


    public function setAddress(){
        $consulta = "INSERT INTO address (direccion,colonia,municipio,estado,pais,cp,lat,`long`) values(?,?,?,?,?,?,?,?)";
        $parametros=array($this->direccion,$this->colonia,$this->municipio,$this->estado,$this->pais,$this->cp,$this->lat,$this->long);
        $db_con=new PDOMYSQL;
        $result=$db_con->consultaSegura($consulta,$parametros);
            return true;
    }


    public function updateAddress(){
    	$consulta="UPDATE address SET direccion =?, colonia = ? municipio = ? estado = ? pais = ? cp = ? lat = ? long = ? user_id = ? WHERE idaddress = ?";
    	$parametros=array($this['direccion'],$this['colonia'],$this['municipio'],$this['estado'],$this['pais'],$this['cp'],$this['lat'],$this['long'],$this['user_id'],$this['idaddress']);
    	$db_con=new PDOMYSQL;
    	$result=$db_con->consultaSegura($consulta,$parametros);
    	if(!empty($result)){
      	    return true; 
        }else{
      	    return false;
        }
    }

    public function deleteAddress(){
    	$consulta="UPDATE address SET bandera =? WHERE idaddress = ?";
    	$parametros=array(0,$this['idaddress']);
    	$db_con=new PDOMYSQL;
    	$result=$db_con->consultaSegura($consulta,$parametros);
    	if(!empty($result)){
      	    return true;
        }else{
      	    return false;
        }
    }
    
    public function setDireccion($direccion){$this->direccion=$direccion;}
    



}
?>