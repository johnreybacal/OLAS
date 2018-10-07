<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectCourseModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"subjectcourse",
				"SubjectCourseId",
			)
		);
	}

	public function save($subjectcourse){
		if($subjectcourse['SubjectCourseId'] == 0){//insert			
			$this->db->query("INSERT into SubjectCourse "
				."(Name) VALUES ("                   
					."'".$subjectcourse['Name']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE SubjectCourse SET "
                ."Name = '".$subjectcourse['Name']."'"
                ."WHERE SubjectCourseId = '".$subjectcourse['SubjectCourseId']."'"
			);			
		}
    }	
    
}