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
				."(Data) VALUES ("                   
					."'".$reservation['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE reservation SET "
                ."Data = '".$reservation['Data']."'"
                ."WHERE ReservationId = '".$reservation['ReservationId']."'"
			);			
		}
    }	
    
}