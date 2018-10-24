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
				."(PatronTypeId, FirstName, MiddleName, LastName, ExtensionName, Password, ContactNumber, Email, IdNumber, RFIDNo) VALUES ("
					."'".$patron['PatronTypeId']."',"
					."'".$patron['FirstName']."',"
					."'".$patron['MiddleName']."',"
					."'".$patron['LastName']."',"
					."'".$patron['ExtensionName']."',"
					."'".$patron['Password']."',"
					."'".$patron['ContactNumber']."',"
					."'".$patron['Email']."',"
					."'".$patron['IdNumber']."',"
					."'".$patron['RFIDNo']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE patron SET "
				."PatronTypeId = '".$patron['PatronTypeId']."', "
				."FirstName = '".$patron['FirstName']."', "				
				."MiddleName = '".$patron['MiddleName']."', "				
				."LastName = '".$patron['LastName']."', "				
				."ExtensionName = '".$patron['ExtensionName']."', "				
				."Password = '".$patron['Password']."', "
				."ContactNumber = '".$patron['ContactNumber']."', "
				."Email = '".$patron['Email']."', "
				."IdNumber = '".$patron['IdNumber']."', "
				."RFIDNo = '".$patron['RFIDNo']."' "
				."WHERE PatronId = '".$patron['PatronId']."'"
			);			
		}
	}	

	public function authenticate($username, $password){
		return $this->db->query("SELECT * FROM Patron WHERE Username = '$username' AND Password = '$password'")->num_rows();
	}

}