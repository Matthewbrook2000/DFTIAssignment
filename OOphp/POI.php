<?php
class Poi {

	private $id, $name, $POItype, $country, $region, $lon, $lat, $description, $recommended, $username;
	
	public function __construct($idIn, $nameIn, $typeIn, $countryIn, $regionIn, $lonIn, $latIn, $descriptionIn, $recommendedIn, $usernameIn){
		$this->id = $idIn;
		$this->name = $nameIn;
		$this->POItype = $typeIn;
		$this->country = $countryIn;
		$this->region = $regionIn;
		$this->lon = $lonIn;
		$this->lat = $latIn;
		$this->description = $descriptionIn;
		$this->recommended = $recommendedIn;
		$this->username = $usernameIn;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPOItype() {
		return $this->POItype;
	}
	
	public function getCountry(){
		return $this->country;
	}
	
	public function getId(){
		return $this->id;
	}
	public function getRegion(){
		return $this->region;
	}
	public function getLon(){
		return $this->lon;
	}
	public function getLat(){
		return $this->lat;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getRecommended(){
		return $this->recommended;
	}
	public function getUsername(){
		return $this->username;
	}
	public function display() {
        echo "Name: " . $this->username . " <br/>Type: " . $this->POItype . "<br />Country: " . $this->country . "<br/>Region: " . $this->region . "<br/>Coordinates: " . $this->lon . " Long. " . $this->lat . " Lat.<br/>Description: " . $this->description . "<br/>Recommended: " . $this->recommended . "<br/>";
		$id = $this->id;
		echo "<a href='recommended.php?id=$id'>Recommended this location</a><br/>";
		echo "<a href='showreview.php?id=$id'>View all reviews</a><br/>";
		echo "<a href='createreview.php?id=$id'>Create review</a><br/>";

		echo "</p>";
	}
				
}
?>