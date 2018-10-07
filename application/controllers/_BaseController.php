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

	public function convert($param){//$param - mga value ng member ng child class		
		$str = '{';		
		$counter = 0;		
		foreach($param as $data => $record){
			if($counter != 0){
				$str .= ',';
			}
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
			$counter++;					
		}
		$str .= '}';
		if($str == '{}')
			return "No data";
		return $str;
	}

	public function loopAll($param){
		$str = '';
		foreach($param as $data => $record){
			foreach($record as $column => $value){
				if($column == "Data" || $column == "Name"){
					$str .= $value .", ";
				}
			}
		}
		return $str;
	}

}
