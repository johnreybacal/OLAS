<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibrarianAccessModel extends CI_Model{

	public function save($librarianId, $librarianRoles){
		$this->db->query("DELETE FROM librarianaccess WHERE LibrarianId = '".$librarianId."'");
		foreach($librarianRoles as $librarianRole){
			$this->db->query("INSERT into librarianaccess "
				."(LibrarianId, LibrarianRoleId) VALUES ("                   
					."'".$librarianId."',"
					."'".$librarianRole."'"
				.")"
			);
		}
	}	
	
	public function _list($id){
		return $this->db->query("SELECT * FROM librarianaccess WHERE LibrarianId = '".$id."'")->result();
	}
    
}