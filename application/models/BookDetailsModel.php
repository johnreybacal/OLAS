<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookDetailsModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"bookdetails",
				"ISBN",
			)
		);
	}

	public function save($book){
		if($book['ISBN'] == 0){//insert			
			$this->db->query("INSERT into bookdetails "
				."(ISBN, Title, PublisherId, SeriesId, Edition, DatePublished) VALUES ("
                    ."'".$book['ISBN']."', "
					."'".$book['Title']."', "					
					."'".$book['PublisherId']."', "
					."'".$book['SeriesId']."', "					
					."'".$book['Edition']."', "
					."'".$book['DatePublished']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE bookdetails SET "
                ."ISBN = '".$book['ISBN']."', "
                ."Title = '".$book['Title']."', "                
                ."PublisherId = '".$book['PublisherId']."', "
                ."SeriesId = '".$book['SeriesId']."', "                
                ."Edition = '".$book['Edition']."', "
                ."DatePublished = '".$book['DatePublished']."'"
			);			
		}
    }	
    
}