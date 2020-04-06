<?php
include("poi_review.php");

class poi_reviewDAO {
	private $table, $conn;
	
	public function __construct($conn, $t){
		$this->conn = $conn;
		$this->table = $t;
	}
	
	public function showPoiReview($id){
			
		$statement = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE poi_id = :id");
		$statement->execute([":id"=>$id]);
		
		if ($statement->rowCount() == 0){
			echo("No results found");
		} else {
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
			{
				$poi_reviewObj = new Poi_review($row["id"], $row["poi_id"], $row["review"], $row["approved"]);
				if($poi_reviewObj->getApproved() == 1){
					echo "<p>";
					echo " Review: " . $poi_reviewObj->getReview();
					echo "</p>";
				}
			}
		}
		
		echo "<a href=\"https://edward2.solent.ac.uk/~assign223/index.php\">Return home </a></br>";
	}
	
	public function showPoiReviewAdmin($id){
			
		$statement = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE poi_id = :id");
		$statement->execute([":id"=>$id]);
		
		if ($statement->rowCount() == 0){
			echo("No results found");
		} else {
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
			{
				$poi_reviewObj = new Poi_review($row["id"], $row["poi_id"], $row["review"], $row["approved"]);
				if($poi_reviewObj->getApproved() == 1){
					echo "<p>";
					echo " Review: " . $poi_reviewObj->getReview();
					echo "</p>";
				} else {
					echo "<p>";
					echo " Review: " . $poi_reviewObj->getReview();
					$revId = $poi_reviewObj->getId();
					echo "<a href=\"https://edward2.solent.ac.uk/~assign223/approveReview.php?id=$revId\">Approve </a></br>";
					echo "</p>";
				}
			}
		}
		
		echo "<a href=\"https://edward2.solent.ac.uk/~assign223/index.php\">Return home </a></br>";
	}
	
	public function createPoiReview($id, $rev){
		$statement = $this->conn->prepare("INSERT INTO " . $this->table . "(poi_id,review,approved) VALUES (:poiid,:rev,0)");
		$statement->execute([":poiid"=>$id, ":rev"=>$rev]);
		
		echo "<p>review added successfully</p>";
	}
	
	public function approvePoiReview($id){
		$statement = $this->conn->prepare("UPDATE " . $this->table . " SET approved=1 WHERE id = :id");
		$statement->execute([":id"=>$id]);
		
		echo"Review Approved";
		echo "<a href=\"https://edward2.solent.ac.uk/~assign223/index.php\">Return home </a></br>";
	}

}
?>