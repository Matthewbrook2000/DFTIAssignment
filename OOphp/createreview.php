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

<?php
	$id = htmlentities($_GET["id"]);
	$reg = htmlentities($_GET["reg"]);
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>PHP Test</title>
</head>
<body>
	<h1>Add Point of interest</h1>
		<form method="post" action="makereview.php">
			<fieldset>
			<label>Enter review:</label>
			<input name="rev" />
			<input type='hidden' name='id' value='<?php echo $id;?>'/>
			<input type='hidden' name='reg' value='<?php echo $reg;?>'/>
			<input type="submit" value="Done" />
			</fieldset>
		</form>
</body>
</html>
<?php
}
?>