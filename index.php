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
	$token = bin2hex(random_bytes(32)); //************************************
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
<title>HitTastic!</title>
</head>
<body>
<h1>HitTastic!</h1>
<p> You are logged in: <?php echo "$un"?></br></p>
<p>filler textfiller textfiller textfiller textfiller textfiller textfiller text
filler textfiller textfiller textfiller textfiller text </p>
<form method="get" action="searchresults.php">
<fieldset>
<label>Please enter an artist:</label>
<input name="theArtist" />
<input type="submit" value="Go!" />
</fieldset>
</form>

<form method="get" action="searchresults2.php">
  <fieldset>
  Search method: <br>
  <select name='searchparam'>
  <?php 
  $searchparam = ["title", "artist", "year"];
  
  foreach($searchparam as $srch){
	  echo "<option>$srch</option>";
  }
  ?>
  <br>
  <label>Search term:</label>
  <input name="searchTerm" />
  <input type="submit" value="Go!" />
  </fieldset>
</form>

<?php
links(); //*****Remove links and use the session token with a button********
?>
</body>
</html>
<?php
}
?>