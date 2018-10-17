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
				."(Name, DateTime, IsOutsider, School, Course, AmountPayed) VALUES ("                   
					."'".$outsideresearcher['Name']."',"
					."'".$outsideresearcher['DateTime']."',"
					."'".$outsideresearcher['IsOutsider']."',"
					."'".$outsideresearcher['School']."',"
					."'".$outsideresearcher['Course']."',"
					."'".$outsideresearcher['AmountPayed']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE outsideresearcher SET "
                ."Name = '".$outsideresearcher['Name']."',"
                ."DateTime = '".$outsideresearcher['DateTime']."',"
                ."IsOutsider = '".$outsideresearcher['IsOutsider']."',"
                ."School = '".$outsideresearcher['School']."',"
                ."Course = '".$outsideresearcher['Course']."',"
                ."AmountPayed = '".$outsideresearcher['AmountPayed']."' "
                ."WHERE OutsideResearcherId = '".$outsideresearcher['OutsideResearcherId']."'"
			);			
		}
    }	
    
}