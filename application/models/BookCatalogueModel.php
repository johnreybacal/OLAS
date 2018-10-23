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
				."(CallNumber, ISBN, DateAcquired, AcquiredFrom, Price, IsRoomUseOnly, IsAvailable, IsActive) VALUES ("
					."'".$book['CallNumber']."', "
					."'".$book['ISBN']."', "					
					."'".$book['DateAcquired']."', "
					."'".$book['AcquiredFrom']."',"
					."'".$book['Price']."',"
					."'".$book['IsRoomUseOnly']."',"
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
				."Price = '".$book['Price']."', "
				."IsRoomUseOnly = '".$book['IsRoomUseOnly']."', "
				."IsAvailable = '".$book['IsAvailable']."', "
				."IsActive = '".$book['IsActive']."' "
				."WHERE AccessionNumber = '".$book['AccessionNumber']."'"
			);			
		}
	}		

	public function lastAcquired($isbn){
		 return $this->db->query("SELECT AcquiredFrom, Price FROM bookcatalogue WHERE ISBN = '".$isbn."'  and DateAcquired = CURRENT_DATE")->row();
	}

}