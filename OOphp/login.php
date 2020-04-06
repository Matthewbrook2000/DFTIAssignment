<?php
session_start();

include("poi_userDAO.php");

$un = htmlentities($_POST["username"]);
$pw = htmlentities($_POST["password"]);

	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$dao = new poi_userDAO($conn, "poi_users");
	
	$poi_userObj = new Poi_user($un, $pw, " ", " ");
	
	$dao->loginUser($poi_userObj);
	
?>