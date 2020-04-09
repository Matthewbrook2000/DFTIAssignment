<?php
include("POI.php");

class poiDAO {
	private $table, $conn;
	
	public function __construct($conn, $t){
		$this->conn = $conn;
		$this->table = $t;
	}
	
	public function addPoi(Poi $poiObj){ 
		$statement = $this->conn->prepare("INSERT INTO " . $this->table . " (name,type,region,description,username) VALUES (:nm,:type,:reg,:desc,:user)");
		$statement->execute([":nm"=> $poiObj->getName(), ":type"=> $poiObj->getPOItype(), ":reg"=> $poiObj->getPOItype(), ":desc"=> $poiObj->getDescription(), ":user"=> $poiObj->getUsername()]);			
	
		echo "<p>Point of interest added successfully! Thanks $un</p></br>";
		echo "<a href=\"https://edward2.solent.ac.uk/~assign223/index.php\">Return home </a></br>";
	}
	
	public function searchPoi($reg){
		
		$statement = $this->conn->prepare("select * from " . $this->table . " where region=:reg");
		$statement->execute([":reg"=>$reg]);
		if ($statement->rowCount() == 0){
			echo("No results found");
		} else {
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
			{
				$poiObj = new Poi($row["ID"], $row["name"], $row["type"], $row["country"], $row["region"], $row["lon"], $row["lat"], $row["description"], $row["recommended"], $row["username"]);
				$poiObj->display();
			}
		}
	}
	
	public function recommendPoi($id, $reg){
		$statement = $this->conn->prepare("UPDATE " . $this->table . " SET recommended=recommended+1 WHERE id = :id");
		$statement->execute([":id"=>$id]);
		
		echo"Recommendation complete </br>";
		echo "<a href=\"https://edward2.solent.ac.uk/~assign223/search.php?reg=$reg\">Return home </a></br>";
	}
	
}
?>