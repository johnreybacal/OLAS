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

	public function isLibrarian(){
		$this->isLoggedIn();
		if(!$this->session->has_userdata('isLibrarian')){
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
			if(is_array($record)){
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
				$str .= '"'.$data .':'.$record.'"';
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
		foreach($param as $data => $record){
			foreach($record as $column => $value){
				if($column == "Name"){
					$str .= $value .", ";
				}
			}
		}
		return $str;
	}

	//removes excess comma at the end for generating tables
	public function removeExcessComma($json){
		if($json != '{ "data": ['){
            $json = substr($json, 0, strlen($json) - 1);
		}
		return $json;
	}

}
