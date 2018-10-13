<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectCourseModel extends CI_Model{

	public function save($subject, $course){
		$this->db->query("DELETE FROM subjectcourse WHERE SubjectId = '".$subject."'");
		foreach($course as $c){
			$this->db->query("INSERT into SubjectCourse "
				."(SubjectId, CourseId) VALUES ("                   
					."'".$subject."',"
					."'".$c."'"
				.")"
			);
		}
	}	
	
	public function _list($id){
		return $this->db->query("SELECT * FROM subjectcourse WHERE SubjectId = '".$id."'")->result();
	}

	
}