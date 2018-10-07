<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmissionModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"admission",
				"AdmissionId",
			)
		);
	}

	public function save($admission){
		if($admission['AdmissionId'] == 0){//insert			
			$this->db->query("INSERT into admission "
				."(Name, DateTime, IsOutsider, School, Course, AmountPayed) VALUES ("                   
					."'".$admission['Name']."'"
					."'".$admission['DateTime']."'"
					."'".$admission['IsOutsider']."'"
					."'".$admission['School']."'"
					."'".$admission['Course']."'"
					."'".$admission['AmountPayed']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE admission SET "
                ."Data = '".$admission['Name']."'"
                ."Data = '".$admission['DateTime']."'"
                ."Data = '".$admission['IsOutsider']."'"
                ."Data = '".$admission['School']."'"
                ."Data = '".$admission['Course']."'"
                ."Data = '".$admission['AmountPayed']."'"
                ."WHERE AdmissionId = '".$admission['AdmissionId']."'"
			);			
		}
    }	
    
}