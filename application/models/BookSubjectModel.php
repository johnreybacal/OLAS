<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookSubjectModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"booksubject",
				"BookSubjectId",
			)
		);
	}

	public function save($booksubject){		
		$this->db->query("INSERT into booksubject "
			."(ISBN, SubjectId) VALUES ("                   
				."'".$booksubject['ISBN']."'"
				."'".$booksubject['SubjectId']."'"
			.")"
		);	
    }	
    
}