<?php
session_start();

$un = htmlentities($_POST["username"]);
$pw = htmlentities($_POST["password"]);

	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$statement = $conn->prepare("select username, password from poi_users where username=:username and password=:password");
	$statement->execute([":username"=>$un, "password"=>$pw]);
	
	$row = $statement->fetch();
	
	if($row== false){
		echo "Incorrect password!";
	} else {
		$_SESSION["gatekeeper"] = $un;
		header ("Location: index.php");
	}
	
?>