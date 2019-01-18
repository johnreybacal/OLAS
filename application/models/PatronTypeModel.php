<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatronTypeModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"patrontype",
				"PatronTypeId",
			)
		);
	}

	public function save($patrontype){
		if($patrontype['PatronTypeId'] == 0){//insert			
			$this->db->query("INSERT into patrontype "
				."(PatronTypeId, Name, NumberOfBooks, NumberOfDays, IsActive) VALUES ("
					."'".$patrontype['PatronTypeId']."', "
					."'".$patrontype['Name']."', "
					."'".$patrontype['NumberOfBooks']."', "
					."'".$patrontype['NumberOfDays']."',"
					."'1'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE patrontype SET "
				."PatronTypeId = '".$patrontype['PatronTypeId']."', "
				."Name = '".$patrontype['Name']."', "				
				."NumberOfBooks = '".$patrontype['NumberOfBooks']."', "
				."NumberOfDays = '".$patrontype['NumberOfDays']."', "
                ."IsActive = '".$patrontype['IsActive']."' "
				."WHERE PatronTypeId = '".$patrontype['PatronTypeId']."'"
			);			
		}
	}	

	public function authenticate($username, $password){
		return $this->db->query("SELECT * FROM patron WHERE Username = '$username' AND Password = '$password'")->num_rows();
	}

}