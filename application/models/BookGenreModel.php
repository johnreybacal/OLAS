<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookGenreModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"bookgenre",
				"BookGenreId",
			)
		);
	}

	public function save($bookgenre){		
		$this->db->query("INSERT into bookgenre "
			."(ISBN, GenreId) VALUES ("                   
				."'".$bookgenre['ISBN']."'"
				."'".$bookgenre['GenreId']."'"
			.")"
		);	
    }	
    
}