<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenreModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"genre",
				"genreId",
			)
		);
	}

	public function save($genre){
		if($genre['GenreId'] == 0){//insert			
			$this->db->query("INSERT into genre "
				."(Name, IsActive) VALUES ("                   
					."'".$genre['Name']."',"
					."'1'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE genre SET "
                ."Name = '".$genre['Name']."',"
                ."IsActive = '".$genre['IsActive']."' "
                ."WHERE GenreId = '".$genre['GenreId']."'"
			);			
		}
    }	
    
}