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
	$un = $_SESSION["gatekeeper"]; 
	$IsAd = $_SESSION["IsAdmin"]
?>
<!DOCTYPE html>
<html>
<head>
<?php
include("functions.php");
writeCSSLink();
$token = bin2hex(random_bytes(32)); //************************************
// go through and remove all un needed comments
// check what that token thing is
// add a region to adding a poi
// after return make it return back to the same page
// after entering new review add a return home button

?>
<title>Points of interest</title>
</head>
<body>
<h1>Points of interest</h1>
<p> Welcome: <?php echo "$un"?></br></p>
<?php 
	if($IsAd == 1){
		echo "<p> Logged in as Admin </br></p>";
	}
?>
<form method="get" action="search.php">
<fieldset>
<label>Please enter a region:</label>
<input name="reg" />
<input type="submit" value="Go!" />
</fieldset>
</form>
<?php		//***************************************************************
links(); //*****Remove links and use the session token with a button********
?>		
</body>
</html>
<?php
}
?>