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
				."(ISBN, DateAcquired, AcquiredFrom, Price, Notes, IsRoomUseOnly, IsAvailable, IsActive) VALUES ("					
					."'".$book['ISBN']."', "					
					."'".$book['DateAcquired']."', "
					."'".$book['AcquiredFrom']."',"
					."'".$book['Price']."',"
					."'".$book['Notes']."',"
					."'".$book['IsRoomUseOnly']."',"
					."'1',"
					."'1'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE bookcatalogue SET "				
				."ISBN = '".$book['ISBN']."', "								
				."DateAcquired = '".$book['DateAcquired']."', "
				."AcquiredFrom = '".$book['AcquiredFrom']."', "
				."Price = '".$book['Price']."', "
				."Notes = '".$book['Notes']."', "
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

	public function getByISBN($isbn, $isAvailable){
		$availability = "";
		if($isAvailable == 1){
			$availability =  " AND IsAvailable = '1' AND IsRoomUseOnly = '0'";
		}
		return $this->db->query("SELECT * from bookcatalogue WHERE ISBN = '".$isbn."'".$availability)->result();
	}

	public function filterDateRange($accessionNumber, $from, $to){
		return $this->db->query("SELECT AccessionNumber FROM bookcatalogue WHERE ISBN IN (SELECT ISBN FROM book WHERE DatePublished BETWEEN '".$from."' AND '".$to."' AND ISBN IN (SELECT ISBN FROM bookcatalogue WHERE AccessionNumber IN (".$accessionNumber.")))")->result();
	}

}