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

	//converts any query to json
	public function convert($param){
		$str = '{';		
		$counter = 0;				
		foreach($param as $data => $record){
			if($counter != 0){
				$str .= ',';
			}
			if(is_array($record) || is_object($record)){
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
			}else{
				$str .= '"'.$data .'":"'.$record.'"';
			}
			$counter++;			
		}
		$str .= '}';
		if($str == '{}')
			return "No data";
		return $str;
	}

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

	//html helpers hehe

	public function IsActive($url){		
		if($url == uri_string()){
			echo "active";
		}
	}

}
