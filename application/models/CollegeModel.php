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
				."(Name, IsActive) VALUES ("                   
					."'".$college['Name']."',"
					."'1'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE college SET "
                ."Name = '".$college['Name']."',"
                ."IsActive = '".$college['IsActive']."' "
                ."WHERE CollegeId = '".$college['CollegeId']."'"
			);			
		}
	}	
	
	public function getDistinct($courses){
		$where = '';
		foreach($courses as $course){
			$where .= "CourseId = '".$course."' OR ";
		}
		$where = substr($where, 0, strlen($where) - 4);
		return $this->db->query("SELECT Name FROM college WHERE CollegeId IN "
			."(SELECT DISTINCT(CollegeId) FROM course WHERE ".$where.")")->result();
	}
    
}