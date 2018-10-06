<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _BaseModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public $table;
	public $identifier;

	public function _setDai($param){
		$this->table = $param[0];
		$this->identifier = $param[1];
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

	public function _get($id){
		$dbList = $this->db->query("SELECT * from ".$this->table." WHERE ".$this->identifier." = '".$id."'")->result();
		return $dbList;		
	}

	public function _list(){
		$dbList = $this->db->query("SELECT * from ".$this->table)->result();
		return $dbList;
	}

}
