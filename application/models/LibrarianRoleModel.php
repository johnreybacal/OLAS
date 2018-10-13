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

	public function save($librarianrole){
		if($librarianrole['LibrarianRoleId'] == 0){//insert			
			$this->db->query("INSERT into librarianrole "
				."(LibrarianRoleId, Name, IsActive) VALUES ("
					."'".$librarianrole['LibrarianRoleId']."', "
					."'".$librarianrole['Name']."',"
					."'1'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE librarianrole SET "
				."LibrarianRoleId = '".$librarianrole['LibrarianRoleId']."', "
				."Name = '".$librarianrole['Name']."', "				
				."IsActive = '".$librarianrole['IsActive']."' "				
				."WHERE LibrarianRoleId = '".$librarianrole['LibrarianRoleId']."'"
			);			
		}
	}	

	public function authenticate($username, $password){
		return $this->db->query("SELECT * FROM Member WHERE Username = '$username' AND Password = '$password'")->num_rows();
	}

}