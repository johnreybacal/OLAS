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
				."(PatronTypeId, FirstName, MiddleName, LastName, ExtensionName, Password, ContactNumber, Email, IdNumber, RFIDNo, DateCreated) VALUES ("
					."'".$patron['PatronTypeId']."',"
					."'".$patron['FirstName']."',"
					."'".$patron['MiddleName']."',"
					."'".$patron['LastName']."',"
					."'".$patron['ExtensionName']."',"
					."'".$patron['Password']."',"
					."'".$patron['ContactNumber']."',"
					."'".$patron['Email']."',"
					."'".$patron['IdNumber']."',"
					."'".$patron['RFIDNo']."',"
					."CURRENT_DATE"
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

	public function authenticate($idNumber, $password){
		$dbResult = $this->db->query("SELECT * FROM patron WHERE IdNumber = '$idNumber' AND Password = '$password'")->row();
		if($dbResult != null){
            return $dbResult->PatronId;
        }else{
            return 0;
		}		
	}

	public function getStudent($IdNumber){
		
	}

	public function search($search){		
		$dbList = $this->db->query("SELECT * FROM patron WHERE LOWER(FirstName) LIKE '%".$search."%' OR '%".$search."%' LIKE LOWER(FirstName) OR LOWER(MiddleName) LIKE '%".$search."%' OR '%".$search."%' LIKE LOWER(MiddleName) OR LOWER(LastName) LIKE '%".$search."%' OR '%".$search."%' LIKE LOWER(LastName) OR LOWER(ExtensionName) LIKE '%".$search."%' OR '%".$search."%' LIKE LOWER(ExtensionName) OR IdNumber = '".$search."'"
		)->result();
		return $dbList;
	}

}