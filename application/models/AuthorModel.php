<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthorModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"author",
				"AuthorId",
			)
		);
	}

	public function save($author){
		if($author['AuthorId'] == 0){//insert			
			$this->db->query("INSERT into author "
				."(Name, IsActive) VALUES ("                   
					."'".$author['Name']."',"
					."'1'"
				.")"
			);
			return $this->db->query("SELECT MAX(AuthorId) as AuthorId FROM author")->row()->AuthorId;
		}
		else{//update
			$this->db->query("UPDATE author SET "
                ."Name = '".$author['Name']."',"
                ."IsActive = '".$author['IsActive']."' "
                ."WHERE AuthorId = '".$author['AuthorId']."'"
			);			
			return $author['AuthorId'];
		}
	}	
	
	public function search($search){
		$dbList = $this->db->query('SELECT AccessionNumber FROM bookcatalogue WHERE ISBN IN (SELECT ISBN FROM bookauthor WHERE AuthorId IN (select AuthorId from author where LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)))')->result();
		return $dbList;
	}

	public function searchAuthor($search){
		$dbList = $this->db->query('SELECT * FROM author WHERE LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)')->result();
		return $dbList;
	}
    
}