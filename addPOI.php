<?php
session_start();
// Test that the authentication session variable exists
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else
{
	$un = $_SESSION["gatekeeper"] 
?>
<!DOCTYPE html>
<html>
<head>
<?php
include("functions.php");
writeCSSLink();
$token = bin2hex(random_bytes(32));
try
{
	$conn = new PDO ("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$results = $conn->query("select username, password from poi_users where username='$un' and password='$pw'");
	
	$row = $results->fetch();
}	
catch(PDOException $e) 
{
    echo "Error: $e";
}
?>
<title>Add POI</title>
</head>
<body>
<h1>Add point of interest</h1>
<p> You are logged in: <?php echo "$un"?></br></p>
<p>Please add any points of interest</p>
<form method="POST" action="adding.php">
<fieldset>
<label>Enter a name:</label>
<input name="POIname" /></br>
<label>Enter a type:</label>
<input name="POItype" /></br>
<label>Enter a description:</label>
<input name="POIdesc" /></br>
<input type="submit" value="Go!" />
</fieldset>
</form>

<?php
links();
?>
</body>
</html>
<?php
}
?>