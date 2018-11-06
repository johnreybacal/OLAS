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
		}
		else{//update
			$this->db->query("UPDATE author SET "
                ."Name = '".$author['Name']."',"
                ."IsActive = '".$author['IsActive']."' "
                ."WHERE AuthorId = '".$author['AuthorId']."'"
			);			
		}
	}	
	
	public function search($search){
		$dbList = $this->db->query('SELECT AccessionNumber FROM bookCatalogue WHERE ISBN IN (SELECT ISBN FROM bookAuthor WHERE AuthorId IN (select AuthorId from author where LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)))')->result();
		return $dbList;
	}

	public function searchAuthor($search){
		$dbList = $this->db->query('SELECT * FROM author WHERE LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)')->result();
		return $dbList;
	}
    
}