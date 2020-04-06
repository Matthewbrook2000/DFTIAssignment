<?php
session_start();
// Test that the authentication session variable exists
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
<?php
	$reg = htmlentities($_GET["reg"]);
	
	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$statement = $conn->prepare("select * from pointsofinterest where region=:reg");
	$statement->execute([":reg"=>$reg]);
	
	if ($statement->rowCount() == 0){
		echo("No results found");
	} else {
		while($row=$statement->fetch(PDO::FETCH_ASSOC))
		{
			$id = $row["ID"];
			echo "<p>";
			echo " Name: ". $row["name"] ."<br/> ";
			echo " Type: " . $row["type"] . "<br/> " ; 
			echo " Country: " .$row["country"]. "<br/>" ; 
			echo " Region: " .$row["region"]. "<br/>" ; 
			echo " Coordinates: " .$row["lon"]. " Long. " .$row["lat"]. " Lat. <br/>" ; 
			echo " Description: " .$row["description"]. "<br/>" ; 
			echo " Recommended: " .$row["recommended"]. "<br/>" ; 
			echo "<a href='recommended.php?id=$id'>Recommended this location</a><br/>";
			echo "<a href='showreview.php?id=$id'>View all reviews</a><br/>";
			echo "<a href='createreview.php?id=$id'>Create review</a><br/>";

			echo "</p>";
		}
	}
?>

</body>
</html>
<?php
}
?>