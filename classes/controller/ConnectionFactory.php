<?php


	define( "DB_DSN", "mysql:aav1dgv9gsq87g.cwhaggvv5lvi.us-west-2.rds.amazonaws.com;dbname=u913897248_adic" );
	define( "DB_USERNAME", "webmaster" );
	define( "DB_PASSWORD", "N3utralz0n3" );
	define( "DB_HOST", "aav1dgv9gsq87g.cwhaggvv5lvi.us-west-2.rds.amazonaws.com" );
	define( "DB_NAME", "u913897248_adic");
class ConnectionFactory{

	private static $factory;
	private $db;
	
	public static function getFactory(){
	    if (!self::$factory){
	        self::$factory = new ConnectionFactory();
	    }
	    return self::$factory;
	}
	
	public function getConnection(){
	    if (is_null($this->db)) 
	    {
	    	$this->db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  			$this->db->set_charset('utf8');
	    }
	    return $this->db;
	}
	
	public function closeConnection(){
	   if (!is_null($this->db)){
	       $db = $this->db;
	       $db->close();
	       $this->db = null;
	   }
	}
}
?>