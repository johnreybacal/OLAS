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
		if($reservation['ReservationId'] == 0){//insert			
			$this->db->query("INSERT into reservation "
				."(MemberId, AccessionNumber, DateReserved, IsDiscarded) VALUES ("                   
					."'".$reservation['MemberId']."'"
					."'".$reservation['AccessionNumber']."'"
					."'".$reservation['DateReserved']."'"
					."'0'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE reservation SET "
                ."MemberId = '".$reservation['MemberId']."'"
                ."AccessionNumber = '".$reservation['AccessionNumber']."'"
                ."DateReserved = '".$reservation['DateReserved']."'"
                ."IsDiscarded = '".$reservation['IsDiscarded']."'"
                ."WHERE ReservationId = '".$reservation['ReservationId']."'"
			);			
		}
    }	
    
}