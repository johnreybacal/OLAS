<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublisherModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"publisher",
				"PublisherId",
			)
		);
	}

	public function save($publisher){
		if($publisher['PublisherId'] == 0){//insert			
			$this->db->query("INSERT into publisher "
				."(Name, IsActive) VALUES ("                   
					."'".$publisher['Name']."',"
					."'1'"
				.")"
			);
			return $this->db->query("SELECT MAX(PublisherId) as PublisherId FROM publisher")->row()->PublisherId;
		}
		else{//update
			$this->db->query("UPDATE publisher SET "
                ."Name = '".$publisher['Name']."',"
                ."IsActive = '".$publisher['IsActive']."' "
                ."WHERE PublisherId = '".$publisher['PublisherId']."'"
			);		
			return $publisher['PublisherId'];	
		}
	}	
	
	public function search($search){
		$dbList = $this->db->query('SELECT AccessionNumber FROM bookCatalogue WHERE ISBN IN (SELECT ISBN FROM book WHERE PublisherId IN (SELECT PublisherId FROM publisher WHERE LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)))')->result();
		return $dbList;
	}
    
}