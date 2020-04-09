<?php
session_start();
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
<title>PHP Test</title>
</head>
<body>

<?php
$id = htmlentities($_GET["id"]);
$reg = htmlentities($_GET["reg"]);

try
{
	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$dao = new poiDAO($conn, "pointsofinterest");
	
	$dao->recommendPoi($id, $reg);
	
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