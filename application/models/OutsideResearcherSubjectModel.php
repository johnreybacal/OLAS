<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutsideResearcherSubjectModel extends CI_Model{

	public function save($outsideResearcherId, $subjects){
		$this->db->query("DELETE FROM outsideresearchersubject WHERE OutsideResearcherId = '".$outsideResearcherId."'");
		foreach($subjects as $subject){
			$this->db->query("INSERT into outsideresearchersubject "
				."(OutsideResearcherId, SubjectId) VALUES ("                   
					."'".$outsideResearcherId."',"
					."'".$subject."'"
				.")"
			);
		}
	}	
	
	public function _list($id){
		return $this->db->query("SELECT * FROM outsideresearchersubject WHERE OutsideResearcherId = '".$id."'")->result();
	}
    
}