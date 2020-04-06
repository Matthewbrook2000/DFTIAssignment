<?php
class Poi_review {
	private $id, $poi_id, $review, $approved;
	
	public function __construct($idIn, $poi_idIn, $reviewIn, $approvedIn){
		$this->id = $idIn;
		$this->poi_id = $poi_idIn;
		$this->review = $reviewIn;
		$this->approved = $approvedIn;
	}
	
	public function getPoi_id() {
		return $this->poi_id;
	}
	
	public function getReview() {
		return $this->review;
	}
	
	public function getApproved(){
		return $this->approved;
	}
	
	public function getId(){
		return $this->id;
	}
}
?>