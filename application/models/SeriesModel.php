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
				."(Data) VALUES ("                   
					."'".$series['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE series SET "
                ."Data = '".$series['Data']."'"
                ."WHERE SeriesId = '".$series['SeriesId']."'"
			);			
		}
    }	
    
}