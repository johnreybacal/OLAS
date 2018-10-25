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
				."(CallNumber, ISBN, Status, DateAcquired, AcquiredFrom) VALUES ("
					."'".$book['CallNumber']."', "
					."'".$book['ISBN']."', "
					."'".$book['Status']."', "
					."'".$book['DateAcquired']."', "
					."'".$book['AcquiredFrom']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE bookcatalogue SET "
				."CallNumber = '".$book['CallNumber']."', "
				."ISBN = '".$book['ISBN']."', "				
				."Status = '".$book['Status']."', "
				."DateAcquired = '".$book['DateAcquired']."', "
				."AcquiredFrom = '".$book['AcquiredFrom']."' "
				."WHERE AccessionNumber = '".$book['AccessionNumber']."'"
			);			
		}
	}		

}