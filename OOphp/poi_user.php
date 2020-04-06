<?php
class Poi_user {
	
	private $username, $password, $isadmin, $id;

	public function __construct($un, $ps, $isad, $idIn){
		$this->username = $un;
		$this->password = $ps;
		$this->isadmin = $isad;
		$this->id = $idIn;
	}
	
	public function getName() {
		return $this->username;
	}
	
	public function getPass() {
		return $this->password;
	}
	
	public function getAdmin(){
		return $this->isadmin;
	} 
	
	public function getId(){
		return $this->id;
	}
	
	public function display() {
        echo "Name " . $this->username . " p: " . $this->password. "<br />";
    }
}
?>