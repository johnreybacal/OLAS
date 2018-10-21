<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"book",
				"ISBN",
			)
		);
	}

	public function save($book){
		if(!$this->bookExist($book['ISBN'])){//insert			
			$this->db->query("INSERT into book "
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
			$this->db->query("UPDATE book SET "                
                ."Title = '".$book['Title']."', "                
                ."PublisherId = '".$book['PublisherId']."', "
                ."SeriesId = '".$book['SeriesId']."', "                
                ."Edition = '".$book['Edition']."', "
				."DatePublished = '".$book['DatePublished']."' "
				."WHERE ISBN = '".$book['ISBN']."'"
			);						
		}
	}	

	public function bookExist($isbn){
		return ($this->db->query("SELECT * FROM book WHERE ISBN = '".$isbn."'")
			->num_rows() != 0);
	}
	
	public function getAuthor($isbn){
		$dbList = $this->db->query("select * from author WHERE AuthorID IN "
			."(select AuthorId from bookauthor WHERE ISBN = '".$isbn."')")->result();
		return $dbList;
	}

	public function getGenre($isbn){
		$dbList = $this->db->query("select * from genre WHERE GenreID IN "
			."(select GenreId from bookgenre WHERE ISBN = '".$isbn."')")->result();
		return $dbList;
	}

	public function getSubject($isbn){
		$dbList = $this->db->query("select * from subject WHERE SubjectID IN "
			."(select SubjectId from booksubject WHERE ISBN = '".$isbn."')")->result();
		return $dbList;
	}

	public function getCourse($isbn){
		$dbList = $this->db->query("select * from course WHERE CourseId IN "
			."(select CourseId from subjectcourse WHERE SubjectId IN "
				."(select SubjectId from booksubject WHERE ISBN = '".$isbn."'))")->result();
		return $dbList;		
	}

	public function getCollege($isbn){		
		$dbList = $this->db->query("select * from college where CollegeId IN "
			."(select CollegeId from course WHERE CourseId IN "
				."(select CourseId from subjectcourse WHERE SubjectId IN "
					."(select SubjectId from booksubject WHERE ISBN = '".$isbn."')))")->result();
		return $dbList;
	}	

	/*queries to use in the future
		unique books
			select * from bookdetails where ISBN IN (select DISTINCT ISBN from book)
		get quantity of books
			select ISBN, Count(ISBN) from book group by ISBN
		get quantity of books that have the status 'In'
			select ISBN, Count(ISBN) from book WHERE Status = 'In' group by ISBN
	*/
    
}