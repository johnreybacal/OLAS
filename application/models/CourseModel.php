<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"course",
				"CourseId",
			)
		);
	}

	public function save($course){
		if($course['CourseId'] == 0){//insert			
			$this->db->query("INSERT into course "
				."(Data) VALUES ("                   
					."'".$course['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE course SET "
                ."Data = '".$course['Data']."'"
                ."WHERE CourseId = '".$course['CourseId']."'"
			);			
		}
    }	
    
}