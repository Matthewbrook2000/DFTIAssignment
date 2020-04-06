<?php
function links()
{
	//, "Add POI" => "/addpoi"
$links = ["Index" => "/home"];

foreach($links as $key => $address){
	echo "<a href=
	\"https://edward2.solent.ac.uk/~assign223/slimapp$address\">$key </a></br>";
}
}
function sessioncheck()
{
	if ( !isset ($_SESSION["gatekeeper"]))
	{
	//Set up here to load separate page
	echo "no session";
	//header("Location: https://edward2.solent.ac.uk/~assign223/slimapp/incorrectlogin");
	return $res->withHeader("Location", "incorrectlogin"); //Doesnt work
	}
}

?>