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
				."(Name) VALUES ("                   
					."'".$course['Name']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE course SET "
                ."Name = '".$course['Name']."'"
                ."WHERE CourseId = '".$course['CourseId']."'"
			);			
		}
    }	
    
}