<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibrarianRoleModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"librarianrole",
				"LibrarianRoleId",
			)
		);
	}

	public function save($memberType){
		if($memberType['LibrarianRoleId'] == 0){//insert			
			$this->db->query("INSERT into member "
				."(LibrarianRoleId, Name, NumberOfBooks, NumberOfDays) VALUES ("
					."'".$memberType['LibrarianRoleId']."', "
					."'".$memberType['Name']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE member SET "
				."LibrarianRoleId = '".$memberType['LibrarianRoleId']."', "
				."Name = '".$memberType['Name']."', "				
				."WHERE LibrarianRoleId = '".$member['LibrarianRoleId']."'"
			);			
		}
	}	

	public function authenticate($username, $password){
		return $this->db->query("SELECT * FROM Member WHERE Username = '$username' AND Password = '$password'")->num_rows();
	}

}