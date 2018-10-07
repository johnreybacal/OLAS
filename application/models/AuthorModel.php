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
				."(Name) VALUES ("                   
					."'".$author['Name']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE author SET "
                ."Name = '".$author['Name']."'"
                ."WHERE AuthorId = '".$author['AuthorId']."'"
			);			
		}
    }	
    
}