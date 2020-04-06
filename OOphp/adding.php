<?php
session_start();
// Test that the authentication session variable exists
require("poiDAO.php");
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
<title>Adding</title>
</head>
<body>

<?php
$nm = $_POST["POIname"];
$type = $_POST["POItype"];
$desc = $_POST["POIdesc"];
try
{
	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$dao = new poiDAO($conn, "pointsofinterest");
	
	$poiObj = new Poi(" ", $nm, $type, " ", " ", " ", " ", $desc, " ", $un);
	
	$dao->addPoi($poiObj);
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