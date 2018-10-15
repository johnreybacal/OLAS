<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookCatalogueModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"bookcatalogue",
				"AccessionNumber",
			)
		);
	}

	public function save($book){
		if($book['AccessionNumber'] == 0){//insert			
			$this->db->query("INSERT into bookcatalogue "
				."(CallNumber, ISBN, DateAcquired, AcquiredFrom, IsAvailable, IsActive) VALUES ("
					."'".$book['CallNumber']."', "
					."'".$book['ISBN']."', "					
					."'".$book['DateAcquired']."', "
					."'".$book['AcquiredFrom']."',"
					."'1',"
					."'1'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE bookcatalogue SET "
				."CallNumber = '".$book['CallNumber']."', "
				."ISBN = '".$book['ISBN']."', "								
				."DateAcquired = '".$book['DateAcquired']."', "
				."AcquiredFrom = '".$book['AcquiredFrom']."', "
				."IsAvailable = '".$book['IsAvailable']."', "
				."IsActive = '".$book['IsActive']."' "
				."WHERE AccessionNumber = '".$book['AccessionNumber']."'"
			);			
		}
	}		

}