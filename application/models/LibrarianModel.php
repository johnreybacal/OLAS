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
				."(FirstName, LastName, Username, Password) VALUES ("					
					."'".$librarian['FirstName']."', "
					."'".$librarian['LastName']."', "
					."'".$librarian['Username']."', "
					."'".$librarian['Password']."' "					
				.")"
			);
			return $this->db->query("SELECT MAX(LibrarianId) as LibrarianId FROM librarian")->row()->LibrarianId;
		}
		else{//update
			$this->db->query("UPDATE librarian SET "				
				."FirstName = '".$librarian['FirstName']."', "				
				."LastName = '".$librarian['LastName']."', "				
				."Username = '".$librarian['Username']."', "
				."Password = '".$librarian['Password']."' "				
				."WHERE LibrarianId = '".$librarian['LibrarianId']."'"
			);			
			return $librarian['LibrarianId'];	
		}
	}	

	public function getRole($librarianId){
		$dbList = $this->db->query("select * from librarianrole WHERE LibrarianRoleId IN "
			."(select LibrarianRoleId from librarianaccess WHERE LibrarianId = '".$librarianId."')")->result();
		return $dbList;
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