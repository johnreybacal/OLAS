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
			$this->db->query("INSERT into subject "
				."(Name, IsActive) VALUES ("                   
					."'".$subject['Name']."',"
					."'1'"
				.")"
			);
			return $this->db->query("SELECT MAX(SubjectId) as SubjectId FROM subject")->row()->SubjectId;
		}
		else{//update
			$this->db->query("UPDATE subject SET "
                ."Name = '".$subject['Name']."',"
                ."IsActive = '".$subject['IsActive']."' "
                ."WHERE SubjectId = '".$subject['SubjectId']."'"
			);
			return $subject['SubjectId'];
		}
	}	
	
	public function search($search){
		$dbList = $this->db->query('SELECT AccessionNumber FROM bookcatalogue WHERE ISBN IN (SELECT ISBN FROM booksubject WHERE SubjectId IN (SELECT SubjectId FROM subject WHERE LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)))')->result();
		return $dbList;
	}
    
}