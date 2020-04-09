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
<h1>Points of interest</h1>
<a href="https://edward2.solent.ac.uk/~assign223/index.php">Back </a></br>
<?php
	$reg = htmlentities($_GET["reg"]);
	
	if(!ctype_alnum($reg))
	{
		echo "ERROR: Input contains characters other than letters and numbers.";
	} 
	else {
		$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$dao = new poiDAO($conn, "pointsofinterest");
	
		$dao->searchPoi($reg);
	}
?>

</body>
</html>
<?php
}
?>