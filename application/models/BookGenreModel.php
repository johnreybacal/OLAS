<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookGenreModel extends CI_Model{

	public function save($isbn, $genres){
		$this->db->query("DELETE FROM bookgenre WHERE ISBN = '".$isbn."'");
		foreach($genres as $genre){
			$this->db->query("INSERT into bookgenre "
				."(ISBN, GenreId) VALUES ("                   
					."'".$isbn."',"
					."'".$genre."'"
				.")"
			);
		}
	}	
	
	public function _list($id){
		return $this->db->query("SELECT * FROM bookgenre WHERE ISBN = '".$id."'")->result();
	}
    
}