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
		if($reservation['ReservationId'] == 0){
			//current-timestamp ung date kaya di na need
			$this->db->query("INSERT into reservation "
				."(MemberId, AccessionNumber, IsDiscarded) VALUES ("                   
					."'".$reservation['MemberId']."',"
					."'".$reservation['AccessionNumber']."',"
					."'0'"
				.")"
			);
		}
		else{//update
			//hindi nababago ang date reserved mga ulol
		}
	}	
	
	public function discard($reservationId){	
		$this->db->query("UPDATE reservation SET "			
			."IsDiscarded = '1' " 
			."WHERE ReservationId = '".$reservation['ReservationId']."'"
		);			
	}
    
}