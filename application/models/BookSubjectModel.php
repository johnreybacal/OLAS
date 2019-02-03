<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookSubjectModel extends CI_Model{

	public function save($isbn, $subjects){
		$this->db->query("DELETE FROM booksubject WHERE ISBN = '".$isbn."'");
		foreach($subjects as $subject){			
			$this->db->query("INSERT into booksubject "
				."(ISBN, SubjectId) VALUES ("                   
					."'".$isbn."',"
					."'".$subject."'"
				.")"
			);
		}
	}	
	
	public function _list($id){
		return $this->db->query("SELECT * FROM booksubject WHERE ISBN = '".$id."'")->result();
	}
    
}