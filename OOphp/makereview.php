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
	$un = $_SESSION["gatekeeper"] 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>makereview</title>
</head>
<body>

<?php
$rev = htmlentities($_POST["rev"]);
$id = htmlentities($_POST["id"]);
$reg = htmlentities($_POST["reg"]);
try
{
	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$dao = new poi_reviewDAO($conn, "poi_reviews");
	
	$dao->createPoiReview($id, $rev, $reg);
	
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