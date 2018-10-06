<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberTypeModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"membertype",
				"MemberTypeId",
			)
		);
	}

	public function save($memberType){
		if($memberType['MemberTypeId'] == 0){//insert			
			$this->db->query("INSERT into member "
				."(MemberTypeId, Name, NumberOfBooks, NumberOfDays) VALUES ("
					."'".$memberType['MemberTypeId']."', "
					."'".$memberType['Name']."', "
					."'".$memberType['NumberOfBooks']."', "
					."'".$memberType['NumberOfDays']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE member SET "
				."MemberTypeId = '".$memberType['MemberTypeId']."', "
				."Name = '".$memberType['Name']."', "				
				."NumberOfBooks = '".$member['NumberOfBooks']."', "
				."NumberOfDays = '".$member['NumberOfDays']."', "
				."WHERE MemberTypeId = '".$member['MemberTypeId']."'"
			);			
		}
	}	

	public function authenticate($username, $password){
		return $this->db->query("SELECT * FROM Member WHERE Username = '$username' AND Password = '$password'")->num_rows();
	}

}