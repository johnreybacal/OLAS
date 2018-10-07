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
				."(LibrarianRoleRoleId, Name, Username, Password) VALUES ("
					."'".$librarianrole['LibrarianRoleRoleId']."', "
					."'".$librarianrole['Name']."', "										
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE librarianrole SET "
				."LibrarianRoleRoleId = '".$librarianrole['LibrarianRoleRoleId']."', "
				."Name = '".$librarianrole['Name']."', "								
				."WHERE LibrarianRoleId = '".$librarianrole['LibrarianRoleId']."'"
			);			
		}
	}	
}