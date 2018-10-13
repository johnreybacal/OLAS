<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookAuthorModel extends CI_Model{

	public function save($isbn, $authors){
		$this->db->query("DELETE FROM bookauthor WHERE ISBN = '".$isbn."'");
		foreach($authors as $author){
			$this->db->query("INSERT into bookauthor "
				."(ISBN, AuthorId) VALUES ("                   
					."'".$isbn."',"
					."'".$author."'"
				.")"
			);
		}
	}	
	
	public function _list($id){
		return $this->db->query("SELECT * FROM bookauthor WHERE ISBN = '".$id."'")->result();
	}
    
}