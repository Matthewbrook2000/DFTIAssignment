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

	$statement = $conn->prepare("INSERT INTO pointsofinterest(name,type,description,username) VALUES (:nm,:type,:desc,:user)");
	$statement->execute([":nm"=>$nm, ":type"=>$type, ":desc"=>$desc, ":user"=>$un]);			//**********************More extensive adding**************************
	
	echo "<p>Point of interest added successfully! Thanks $un</p>";
}
// Catch any exceptions (errors) thrown from the 'try' block
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