<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentCourseModel extends CI_Model{

	public function save($patronId, $courseId){		
		$this->delete($patronId);
		$this->db->query("INSERT into studentcourse "
			."(PatronId, CourseId) VALUES ("
				."'".$patronId."',"
				."'".$courseId."'"
			.")"
		);		
	}	

	public function delete($patronId){		
		$this->db->query("DELETE FROM studentcourse WHERE PatronId = '".$patronId."'");
	}
	
	public function _get($id){
		return $this->db->query("SELECT * FROM studentcourse WHERE PatronId = '".$id."'")->row()->CourseId;
	}

	public function studentExist($idNumber){
		return $this->db->query("SELECT * FROM patron WHERE IdNumber = '".$idNumber."' AND PatronTypeId = '1'")->row();
	}

}