<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatronModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"patron",
				"PatronId",
			)
		);
	}

	public function save($patron){
		if($patron['PatronId'] == 0){//insert			
			$this->db->query("INSERT into patron "
				."(PatronTypeId, FirstName, LastName, Username, Password, ContactNumber, Email) VALUES ("
					."'".$patron['PatronTypeId']."',"
					."'".$patron['FirstName']."',"
					."'".$patron['LastName']."',"
					."'".$patron['Username']."',"
					."'".$patron['Password']."',"
					."'".$patron['ContactNumber']."',"
					."'".$patron['Email']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE patron SET "
				."PatronTypeId = '".$patron['PatronTypeId']."', "
				."FirstName = '".$patron['FirstName']."', "				
				."LastName = '".$patron['LastName']."', "				
				."Username = '".$patron['Username']."', "
				."Password = '".$patron['Password']."', "
				."ContactNumber = '".$patron['ContactNumber']."', "
				."Email = '".$patron['Email']."' "
				."WHERE PatronId = '".$patron['PatronId']."'"
			);			
		}
	}	

	public function authenticate($idNumber, $password){
		$dbResult = $this->db->query("SELECT * FROM patron WHERE IdNumber = '$idNumber' AND Password = '$password'")->row();
		if($dbResult != null){
            return $dbResult->PatronId;
        }else{
            return 0;
		}		
	}

}