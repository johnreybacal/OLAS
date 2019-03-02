<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservationModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"reservation",
				"ReservationId",
			)
		);
	}

	public function save($reservation){
		//current-timestamp ung date kaya di na need
		$this->db->query("INSERT into reservation "
			."(PatronId, AccessionNumber, IsDiscarded, IsActive) VALUES ("                   
				."'".$reservation['PatronId']."',"
				."'".$reservation['AccessionNumber']."',"
				."'0',"
				."'1'"
			.")"
		);		
	}
	
	public function isReserved($accessionNumber){
		$isReserved = $this->db->query("SELECT * FROM reservation WHERE "			
			."AccessionNumber = '".$accessionNumber."' AND " 
			."IsActive = '1'"
		)->row();
		if(is_object($isReserved)){
			return array('IsReserved' => 1, 'PatronId' => $isReserved->PatronId);	
		}else{
			return array('IsReserved' => 0);
		}

	}
	
	public function discard($reservationId){	
		$this->db->query("UPDATE reservation SET "			
			."IsDiscarded = '1', " 
			."IsActive = '0' " 
			."WHERE ReservationId = '".$reservationId."'"
		);			
	}

	public function setInactive($reservationId){	
		$this->db->query("UPDATE reservation SET "			
			."IsActive = '0' " 
			."WHERE ReservationId = '".$reservationId."'"
		);			
	}

	public function checkReservation(){
		return $this->db->query("SELECT * FROM reservation WHERE IsActive = '1' AND PatronId = '".$this->session->userdata('patronId')."'")->num_rows();
	}
	
    
}