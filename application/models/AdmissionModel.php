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

	public function save($patronId){
        $this->db->query("INSERT into admission "
            ."(PatronId) VALUES ("                   
                ."'".$patronId."'"
            .")"
        );					
	}	
    
}