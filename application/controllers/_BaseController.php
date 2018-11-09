<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class _BaseController extends CI_Controller {

	public function __construct(){
		parent::__construct();		
	}

	public function header(){
		$this->load->view('include/Header');		
	}

	public function footer(){		
		$this->load->view('include/Footer');
	}

	//check if librarian is logged in
	public function isLoggedIn(){
		if(!$this->session->has_userdata('isLoggedIn')){
			redirect(base_url('Librarian/Login'));
		}
		return true;
	}

	//view for librarian, redirects to 403 if the librarian doesnt have access to url
	public function librarianView($url, $data){
		$allowed = array(
			'Library' => array('Book', 'Author', 'Genre', 'Series', 'Publisher'),
			'Circulation' => array('Circulation', 'Reservation'),
			'Patron Management' => array('Patron', 'PatronType'),
			'Outside Researcher' => array('OutsideResearcher'),
			'University' => array('Subject', 'Course', 'College'),
			'Staff Management' => array('Librarian'),
		);
		$this->isLoggedIn();
		if($this->session->has_userdata('isLibrarian')){
			$access = true;
			$controller = explode("/",$url)[0];			
			if($url != 'Librarian/Dashboard'){
				foreach($allowed as $key => $value){					
					if(in_array($controller , $value)){						
						if(in_array($key , $this->session->userdata('access'))){
							$access = true;							
						}else{							
							$access = false;
						}
						break;
					}
				}
			}			
			if($access == 1){
				$this->header();
				$this->load->view($url, $data);
				$this->footer();
			}else{
				echo "403: Access Denied";
			}
		}
		else{
			echo "403: Access Denied";
		}
		return true;
	}

	public function UnsetSession(){
		$this->session->unset_userdata(array('librarianId', 'patronId', 'name', 'isLoggedIn', 'isLibrarian', 'isPatron', 'access'));
	}
	public function LogOut($page){
		$this->UnsetSession();
        redirect(base_url($page));
    }

	//converts any query to json, even cart content sugoi
	//for js
	public function convert($param){
		$str = '{';		
		$counter = 0;			
		if($param == null){//null
			return '{}';
		}
		foreach($param as $data => $record){
			if($counter != 0){
				$str .= ',';
			}
			if(is_array($record) || is_object($record)){//for multiple rows, example: _list()
				$str .= '"'.$counter.'":{';							
				$first = true;
				foreach($record as $column => $value){
					if(!$first){
						$str .= ',';
					}
					$str .= '"'.$column.'":"'.$value.'"';
					$first = false;
				}
				$str .= '}';				
			}else{//for single row, example: _get()
				$str .= '"'.$data .'":"'.$record.'"';
			}
			$counter++;			
		}
		$str .= '}';		
		return $str;
	}

	//wow nagbabasa ng code, sipag ah tanginamo ah hahahahaha

	//--------------------------
	//for generating tables
	//loops through multivalued attributes
	public function loopAll($param){
		$str = '';
		$first = true;
		foreach($param as $data => $record){
			foreach($record as $column => $value){
				if(!$first){
					$str .= ' ';
				}
				if($column == "Name"){
					$str .= $value .",";
				}
				$first = false;
			}
		}
		return $this->removeExcessComma($str);
	}

	//removes excess comma at the end for generating tables
	public function removeExcessComma($str){
		if($str != '{ "data": ['){
            $str = substr($str, 0, strlen($str) - 1);
		}
		return $str;
	}
	//also useful in other things
	//--------------------------

	//returns invalid element, for validation
	public function invalid($name, $message){
		return '"'.$name.'":"<div class=\"invalid-feedback\" style=\"display:block\">'.$message.'</div>",';
	}

	//notifies the patron
	public function NotifyPatron($patronId, $title, $message){
		$this->message->save(array(
			"PatronId" => $patronId,
			"Title" => $title,
			"Message" => $message
		));
		// sena, dito ilagay ang sms at email
		// mga need mong data:
		// uncomment the ff:
		// $patron = $this->patron->_get($patronId);
		// $patron->ContactNumber //contact number
		// $patron->Email //Email
	}

	//returns full data of book searched, with filter
	public function Search(){
		$search = $this->input->post('search')['search'];
		$accessionNumber = '';
		$str = '{';
		//filter
		if(array_key_exists('filter', $this->input->post('search'))){
			$filter = $this->input->post('search')['filter'];		
			if(in_array("Title" , $filter)){			
				foreach($this->book->search($search) as $x){
					$accessionNumber .= "'".$x->AccessionNumber."',";				
				}
			}
			if(in_array("Author" , $filter)){
				foreach($this->author->search($search) as $x){
					$accessionNumber .= "'".$x->AccessionNumber."',";
				}			
			}
			if(in_array("Subject" , $filter)){
				foreach($this->subject->search($search) as $x){
					$accessionNumber .= "'".$x->AccessionNumber."',";
				}
			}
			if(in_array("Genre" , $filter)){
				foreach($this->genre->search($search) as $x){
					$accessionNumber .= "'".$x->AccessionNumber."',";
				}
			}		
			if(in_array("Series" , $filter)){
				foreach($this->series->search($search) as $x){
					$accessionNumber .= "'".$x->AccessionNumber."',";
				}
			}			
			if(in_array("Publisher" , $filter)){
				foreach($this->publisher->search($search) as $x){
					$accessionNumber .= "'".$x->AccessionNumber."',";
				}
			}			
		}		
		//date published range		
		if($this->input->post('search')['filterByDatePublished'] == 'true' && $accessionNumber != null){
			$temp = '';
			foreach($this->bookCatalogue->filterDateRange($this->removeExcessComma($accessionNumber), $this->input->post('search')['rangeFrom'], $this->input->post('search')['rangeTo']) as $x){
				$temp .= "'".$x->AccessionNumber."',";
			}			
			$accessionNumber = $temp;
		}		
		$accessionNumber = $this->removeExcessComma($accessionNumber);				
		if($accessionNumber != null){
			foreach($this->bookCatalogue->_list('WHERE AccessionNumber IN ('.$accessionNumber.')') as $x){
				$book = $this->book->_get($x->ISBN);
				$str .= '"'.$x->AccessionNumber.'":{';
				$str .= '"catalogue":'.$this->convert($x).',';
				$str .= '"book":'.$this->convert($book).',';
				$str .= '"series":'.$this->convert($this->series->_get($book->SeriesId)).',';
				$str .= '"publisher":'.$this->convert($this->publisher->_get($book->PublisherId)).',';
				$str .= '"reservation":'.$this->convert($this->reservation->isReserved($x->AccessionNumber)).',';
				//author
				$authorCounter = 0;
				$str .= '"author":{';
					foreach($this->bookAuthor->_list($x->ISBN) as $author){
						if($authorCounter != 0){
							$str .= ',';
						}
						$str .= '"'.$authorCounter.'":'.$this->convert($this->author->_get($author->AuthorId));
						$authorCounter++;
					}  				
					$str .= '},';
					
				//genre
				$genreCounter = 0;
				$str .= '"genre":{';
				foreach($this->bookGenre->_list($x->ISBN) as $genre){
					if($genreCounter != 0){
						$str .= ',';
					}
					$str .= '"'.$genreCounter.'":'.$this->convert($this->genre->_get($genre->GenreId));
					$genreCounter++;
				}  				
				$str .= '},';
	
				//subject
				$subjectCounter = 0;
				$str .= '"subject":{';
				foreach($this->bookSubject->_list($x->ISBN) as $subject){
					if($subjectCounter != 0){
						$str .= ',';
					}
					$str .= '"'.$subjectCounter.'":'.$this->convert($this->subject->_get($subject->SubjectId));
					$subjectCounter++;
				}  				
				$str .= '}';
	
	
				$str .= '},';			
			}
			//throws to ajax success
			echo $this->removeExcessComma($str).'}';				
		}else{
			//no data
			echo '{}';
		}
	}

	public function SearchAuthor(){
		echo $this->convert($this->author->searchAuthor($this->input->post('search')['search']));
	}

	public function SearchPatron(){		
		echo $this->convert($this->patron->search($this->input->post('search')['search']));
	}

}
