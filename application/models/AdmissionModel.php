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
					."'".$admission['Name']."',"
					."'".$admission['DateTime']."',"
					."'".$admission['IsOutsider']."',"
					."'".$admission['School']."',"
					."'".$admission['Course']."',"
					."'".$admission['AmountPayed']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE admission SET "
                ."Name = '".$admission['Name']."',"
                ."DateTime = '".$admission['DateTime']."',"
                ."IsOutsider = '".$admission['IsOutsider']."',"
                ."School = '".$admission['School']."',"
                ."Course = '".$admission['Course']."',"
                ."AmountPayed = '".$admission['AmountPayed']."' "
                ."WHERE AdmissionId = '".$admission['AdmissionId']."'"
			);			
		}
    }	
    
}