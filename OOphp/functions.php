<?php
function links()
{
$links = ["Index" => "index.php", "Add POI" => "addPOI.php"];

foreach($links as $key => $address){
	echo "<a href=
	\"https://edward2.solent.ac.uk/~assign223/$address\">$key </a></br>";
}
}

function writeCSSLink()
{
	$a = "style.css";
	
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">";
}
?>