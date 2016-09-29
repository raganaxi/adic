<?php
include ('database.php');

class Usuario extend ORM {
  public $id, $role, $active, $username, $pass, $reg_type;
  protected static $table = "user";
  public function __construct($data) {
    parent::__construct();
    if ($data && sizeof($data)) {
      $this->populateFromRow($data);
    }
  }
  public function populateFromRow($data){
    $this->id=isset($data['id']) ? intval($data['id']) : null;
    $this->id=isset($data['role']) ? intval($data['role']) : null;
    $this->id=isset($data['active']) ? intval($data['active']) : null;
    $this->id=isset($data['username']) ? intval($data['username']) : null;
    $this->id=isset($data['pass']) ? intval($data['pass']) : null;
    $this->id=isset($data['reg_type']) ? intval($data['reg_type']) : null;
  }
}

?>
