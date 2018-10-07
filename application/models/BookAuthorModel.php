<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookAuthorModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"bookauthor",
				"BookAuthorId",
			)
		);
	}

	public function save($bookauthor){		
		$this->db->query("INSERT into bookauthor "
			."(ISBN, AuthodId) VALUES ("                   
				."'".$bookauthor['ISBN']."'"
				."'".$bookauthor['AuthorId']."'"
			.")"
		);	
    }	
    
}