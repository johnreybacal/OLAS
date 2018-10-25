<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutsideResearcherModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"outsideresearcher",
				"OutsideResearcherId",
			)
		);
	}

	public function save($outsideresearcher){
		if($outsideresearcher['OutsideResearcherId'] == 0){//insert			
			$this->db->query("INSERT into outsideresearcher "
				."(Name, DateTime, AmountPayed) VALUES ("                   
					."'".$outsideresearcher['Name']."',"
					."'".$outsideresearcher['DateTime']."',"					
					."'".$outsideresearcher['AmountPayed']."'"
				.")"
			);
			return $this->db->query("SELECT MAX(OutsideResearcherId) as OutsideResearcherId FROM outsideresearcher")->row()->OutsideResearcherId;
		}
		else{//update
			$this->db->query("UPDATE outsideresearcher SET "
                ."Name = '".$outsideresearcher['Name']."',"
                ."DateTime = '".$outsideresearcher['DateTime']."',"
                ."AmountPayed = '".$outsideresearcher['AmountPayed']."' "
                ."WHERE OutsideResearcherId = '".$outsideresearcher['OutsideResearcherId']."'"
			);		
			return $outsideresearcher['OutsideResearcherId'];	
		}
	}	
	
	public function getSubject($id){
		$dbList = $this->db->query("select * from subject WHERE SubjectId IN "
			."(select SubjectId from outsideresearchersubject WHERE OutsideResearcherId = '".$id."')")->result();
		return $dbList;
	}
    
}