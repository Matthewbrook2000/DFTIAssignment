<?php
session_start();
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
	echo "<a href=\"https://edward2.solent.ac.uk/~assign223/login.html\">Login page </a></br>";
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
?>
<title>Add POI</title>
</head>
<body>
<h1>Add point of interest</h1>
<p> Welcome: <?php echo "$un"?></br></p>
<p>Please add any points of interest</p>
<form method="POST" action="adding.php">
<fieldset>
<label>Enter a name:</label>
<input name="POIname" /></br>
<label>Enter a type:</label>
<input name="POItype" /></br>
<label>Enter a region:</label>
<input name="POIreg" /></br>
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