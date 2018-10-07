<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CollegeModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"college",
				"CollegeId",
			)
		);
	}

	public function save($college){
		if($college['CollegeId'] == 0){//insert			
			$this->db->query("INSERT into college "
				."(Name) VALUES ("                   
					."'".$college['Name']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE college SET "
                ."Name = '".$college['Name']."'"
                ."WHERE CollegeId = '".$college['CollegeId']."'"
			);			
		}
    }	
    
}