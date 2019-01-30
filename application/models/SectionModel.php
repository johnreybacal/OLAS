<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SectionModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"section",
				"SectionId",
			)
		);
	}

	public function save($section){
		if($section['SectionId'] == 0){//insert			
			$this->db->query("INSERT into section "
				."(Name, IsActive) VALUES ("                   
					."'".$section['Name']."',"
					."'1'"
				.")"
			);
			return $this->db->query("SELECT MAX(SectionId) as SectionId FROM section")->row()->SectionId;
		}
		else{//update
			$this->db->query("UPDATE section SET "
                ."Name = '".$section['Name']."',"
                ."IsActive = '".$section['IsActive']."' "
                ."WHERE SectionId = '".$section['SectionId']."'"
			);			
			return $section['SectionId'];
		}
	}	
	
	public function search($search){
		$dbList = $this->db->query('SELECT AccessionNumber FROM bookcatalogue WHERE ISBN IN (SELECT ISBN FROM book WHERE SectionId IN (SELECT SectionId FROM section WHERE LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)))')->result();
		return $dbList;
	}
    
}