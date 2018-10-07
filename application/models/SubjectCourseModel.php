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
				."(Data) VALUES ("                   
					."'".$subjectcourse['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE SubjectCourse SET "
                ."Data = '".$subjectcourse['Data']."'"
                ."WHERE SubjectCourseId = '".$subjectcourse['SubjectCourseId']."'"
			);			
		}
    }	
    
}