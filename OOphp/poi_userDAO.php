<?php
include("poi_user.php");

class poi_userDAO {

	private $conn, $t;
	
	public function __construct($conn, $table){
		$this->conn = $conn;
		$this->t = $table;
	}
	
	public function loginUser(Poi_user $poi_userObj){
		$statement = $this->conn->prepare("select * from " . $this->t . " where username=:username and password=:password");
		$statement->execute([":username"=> $poi_userObj->getName(), ":password"=> $poi_userObj->getPass()]);
		$row = $statement->fetch();
		if($row== false){
			echo "Incorrect password!";
		} else {
			$_SESSION["gatekeeper"] = $poi_userObj->getName();
			$_SESSION["IsAdmin"] = $row["isadmin"];
			header ("Location: index.php");
		}
	}
}
?>