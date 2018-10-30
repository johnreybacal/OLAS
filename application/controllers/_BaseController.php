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

	public function isLoggedIn(){
		if(!$this->session->has_userdata('isLoggedIn')){
			redirect(base_url('Librarian/Login'));
		}
		return true;
	}

	public function librarianView($url, $data){
		$this->isLoggedIn();
		if($this->session->has_userdata('isLibrarian')){
			$this->header();
			$this->load->view($url, $data);
			$this->footer();
		}
		else{
			echo "403: Access Denied";
		}
		return true;
	}

	public function UnsetSession(){
		$this->session->unset_userdata(array('librarianId', 'patronId', 'name', 'isLoggedIn', 'isLibrarian', 'isPatron'));
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
		if($str == '{}')
			return "No data";
		return $str;
	}

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

}
