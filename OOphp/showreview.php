<?php
session_start();
require("poi_reviewDAO.php");
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
	echo "<a href=\"https://edward2.solent.ac.uk/~assign223/login.html\">Login page </a></br>";
}
else
{
	$un = $_SESSION["gatekeeper"]; 
	$IsAd = $_SESSION["IsAdmin"]
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>PHP Test</title>
</head>
<body>
<h1>Points of interest</h1>
<?php
$id = htmlentities($_GET["id"]);
$reg = htmlentities($_GET["reg"]);

try
{
	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$dao = new poi_reviewDAO($conn, "poi_reviews");
	
	if($IsAd == 1){
		$dao->showPoiReviewAdmin($id, $reg);
	} else {	
		$dao->showPoiReview($id, $reg);
	}
	
}
catch(PDOException $e) 
{
    echo "Error: $e";
}

?>

</body>
</html>
<?php
}
?>