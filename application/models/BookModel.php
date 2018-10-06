<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"book",
				"AccessionNumber",
			)
		);
	}

	public function save($book){
		if($book['AccessionNumber'] == 0){//insert			
			$this->db->query("INSERT into book "
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
			$this->db->query("UPDATE book SET "
				."CallNumber = '".$book['CallNumber']."', "
				."ISBN = '".$book['ISBN']."', "				
				."Status = '".$book['Status']."', "
				."DateAcquired = '".$book['DateAcquired']."', "
				."AcquiredFrom = '".$book['AcquiredFrom']."' "
				."WHERE AccessionNumber = '".$book['AccessionNumber']."'"
			);			
		}
	}	

	/*queries to use in the future
		unique books
			select * from bookdetails where ISBN IN (select DISTINCT ISBN from book)
		get quantity of books
			select ISBN, Count(ISBN) from book group by ISBN
		get quantity of books that have the status 'In'
			select ISBN, Count(ISBN) from book WHERE Status = 'In' group by ISBN
	*/

}