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
			return $this->db->query("SELECT MAX(SeriesId) as SeriesId FROM series")->row()->SeriesId;
		}
		else{//update
			$this->db->query("UPDATE series SET "
                ."Name = '".$series['Name']."',"
                ."IsActive = '".$series['IsActive']."' "
                ."WHERE SeriesId = '".$series['SeriesId']."'"
			);			
			return $series['SeriesId'];
		}
	}	

	public function search($search){
		$dbList = $this->db->query('SELECT AccessionNumber FROM bookCatalogue WHERE ISBN IN (SELECT ISBN FROM book WHERE SeriesId IN (SELECT SeriesId FROM series WHERE LOWER(Name) LIKE "%'.$search.'%" OR "%'.$search.'%" LIKE LOWER(Name)))')->result();
		return $dbList;
	}
    
}