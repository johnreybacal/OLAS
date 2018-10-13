<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibrarianModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"librarian",
				"LibrarianId",
			)
		);
	}

	public function save($librarian){
		if($librarian['LibrarianId'] == 0){//insert			
			$this->db->query("INSERT into librarian "
				."(LibrarianRoleId, FirstName, LastName, Username, Password) VALUES ("
					."'".$librarian['LibrarianRoleId']."', "
					."'".$librarian['FirstName']."', "
					."'".$librarian['LastName']."', "
					."'".$librarian['Username']."', "
					."'".$librarian['Password']."' "					
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE librarian SET "
				."LibrarianRoleId = '".$librarian['LibrarianRoleId']."', "
				."FirstName = '".$librarian['FirstName']."', "				
				."LastName = '".$librarian['LastName']."', "				
				."Username = '".$librarian['Username']."', "
				."Password = '".$librarian['Password']."' "				
				."WHERE LibrarianId = '".$librarian['LibrarianId']."'"
			);			
		}
	}	

	public function authenticate($username, $password){
		$dbResult = $this->db->query("SELECT * FROM librarian WHERE Username = '$username' AND Password = '$password'")->row();
		if($dbResult != null){
            return $dbResult->LibrarianId;
        }else{
            return 0;
		}		
	}

}