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
	public function librarianView($url, $data, $loadModals = null){
		$allowed = array(
			'Library' => array('Book', 'Author', 'Section', 'Series', 'Publisher'),
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
				if($loadModals == 1){
					$this->load->view('Author/_Author_Modal');
					$this->load->view('Section/_Section_Modal');
					$this->load->view('Publisher/_Publisher_Modal');
					$this->load->view('Series/_Series_Modal');
					$this->load->view('Subject/_Subject_Modal');
				}
				else if(in_array('Circulation' , $this->session->userdata('access'))){
					$this->load->view('Circulation/QRFab');
					$this->load->view('Circulation/QR_script');
				}
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
		if(substr($str, strlen($str) - 1, strlen($str)) == ' '){
			return $this->removeExcessComma(substr($str, 0, strlen($str) - 1));
		}else{
			return $this->removeExcessComma($str);
		}
		// return $str;
	}

	//formats accession number
	public function formatAccessionNumber($accessionNumber){
		$accessionNumber = '000000'.$accessionNumber;
		return substr($accessionNumber, (strlen($accessionNumber) - 6));
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
		$patron = $this->patron->_get($patronId);

		$number = $patron->ContactNumber;
		if(strlen($number) > 11){
			$number = '0'.substr($number, (strlen($number) - 10));
		}
		$title = "Hello!";
		$apicode = "TR-SHIDO110623_KWUSB";
		$ch = curl_init();
		$itexmo = array(
			'1' => $number,
			'2' => $message,
			'3' => $apicode
		);
	
		curl_setopt($ch, CURLOPT_URL, "https://www.itexmo.com/php_api/api.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($itexmo));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
        $this->load->library('email');
		$this->email->from('srphfthnd@gmail.com', 'OLAS');
        $this->email->to($patron->Email);
        $this->email->subject($title);
        $this->email->message($message);
        $this->email->send();
        
        return curl_exec ($ch);
		curl_close ($ch);
	}

	//returns full data of book searched, with filter
	public function Search(){
		$search = $this->input->post('search')['search'];
		$accessionNumber = '';
		$str = '{';
		//filter
		if(array_key_exists('filter', $this->input->post('search'))){
			$filter = $this->input->post('search')['filter'];		
			if(in_array("Book" , $filter)){			
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
			if(in_array("Section" , $filter)){
				foreach($this->section->search($search) as $x){
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
			// foreach($this->bookCatalogue->_list('WHERE AccessionNumber IN ('.$accessionNumber.')') as $x){
			foreach($this->bookCatalogue->search($accessionNumber) as $x){
				$book = $this->book->_get($x->ISBN);
				$str .= '"'.$x->ISBN.'":{';
				// $str .= '"catalogue":'.$this->convert($x).',';
				$str .= '"book":'.$this->convert($book).',';
				$str .= '"copies":'.$x->Copies.',';
				// $str .= '"series":'.$this->convert($this->series->_get($book->SeriesId)).',';
				// $str .= '"publisher":'.$this->convert($this->publisher->_get($book->PublisherId)).',';
				// $str .= '"reservation":'.$this->convert($this->reservation->isReserved($x->AccessionNumber)).',';
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
				$str .= '}';				
				//subject
				// $subjectCounter = 0;
				// $str .= '"subject":{';
				// foreach($this->bookSubject->_list($x->ISBN) as $subject){
				// 	if($subjectCounter != 0){
				// 		$str .= ',';
				// 	}
				// 	$str .= '"'.$subjectCounter.'":'.$this->convert($this->subject->_get($subject->SubjectId));
				// 	$subjectCounter++;
				// }  				
				// $str .= '}';
	
	
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
