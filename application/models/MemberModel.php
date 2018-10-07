<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"member",
				"MemberId",
			)
		);
	}

	public function save($member){
		if($member['MemberId'] == 0){//insert			
			$this->db->query("INSERT into member "
				."(MemberTypeId, Name, Username, Password, ContactNumber) VALUES ("
					."'".$member['MemberTypeId']."', "
					."'".$member['Name']."', "
					."'".$member['Username']."', "
					."'".$member['Password']."', "
					."'".$member['ContactNumber']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE member SET "
				."MemberTypeId = '".$member['MemberTypeId']."', "
				."Name = '".$member['Name']."', "				
				."Username = '".$member['Username']."', "
				."Password = '".$member['Password']."', "
				."ContactNumber = '".$member['ContactNumber']."' "
				."WHERE MemberId = '".$member['MemberId']."'"
			);			
		}
	}	

	public function authenticate($username, $password){
		return $this->db->query("SELECT * FROM Member WHERE Username = '$username' AND Password = '$password'")->num_rows();
	}

}