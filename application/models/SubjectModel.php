<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"subject",
				"SubjectId",
			)
		);
	}

	public function save($subject){
		if($subject['SubjectId'] == 0){//insert			
			$this->db->query("INSERT into Subject "
				."(Data) VALUES ("                   
					."'".$subject['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE Subject SET "
                ."Data = '".$subject['Data']."'"
                ."WHERE SubjectId = '".$subject['SubjectId']."'"
			);			
		}
    }	
    
}