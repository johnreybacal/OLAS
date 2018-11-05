<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeriesModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"series",
				"SeriesId",
			)
		);
	}

	public function save($series){
		if($series['SeriesId'] == 0){//insert			
			$this->db->query("INSERT into series "
				."(Name, IsActive) VALUES ("                   
					."'".$series['Name']."',"
					."'1'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE series SET "
                ."Name = '".$series['Name']."',"
                ."IsActive = '".$series['IsActive']."' "
                ."WHERE SeriesId = '".$series['SeriesId']."'"
			);			
		}
    }	
    
}