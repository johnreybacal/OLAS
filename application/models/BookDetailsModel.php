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
				."(ISBN, Title, AuthorId, GenreId, PublisherId, SeriesId, CourseId, SubjectId, Edition, DatePublished) VALUES ("
                    ."'".$book['ISBN']."', "
					."'".$book['Title']."', "
					."'".$book['AuthorId']."', "
					."'".$book['GenreId']."', "
					."'".$book['PublisherId']."', "
					."'".$book['SeriesId']."', "
					."'".$book['CourseId']."', "
					."'".$book['SubjectId']."', "
					."'".$book['Edition']."', "
					."'".$book['DatePublished']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE bookdetails SET "
                ."ISBN = '".$book['ISBN']."', "
                ."Title = '".$book['Title']."', "
                ."AuthorId = '".$book['AuthorId']."', "
                ."GenreId = '".$book['GenreId']."', "
                ."PublisherId = '".$book['PublisherId']."', "
                ."SeriesId = '".$book['SeriesId']."', "
                ."CourseId = '".$book['CourseId']."', "
                ."SubjectId = '".$book['SubjectId']."', "
                ."Edition = '".$book['Edition']."', "
                ."DatePublished = '".$book['DatePublished']."'"
			);			
		}
    }	
    
}