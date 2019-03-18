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

	//get specific row with the respecive primary key of the table, parameter is extra query, example: WHERE
	public function _get($id, $query = null){
		$dbList = $this->db->query("SELECT * from ".$this->table." WHERE ".$this->identifier." = '".$id."' ".$query)->row();
		foreach($dbList as $key => $value){
			// $value = trim(preg_replace('/\s+/', '\n', $value));
			$dbList->$key = str_replace('"', '\"', $value);
		}
		return $dbList;		
	}

	//lists all data in a table, parameter is extra query, example: WHERE
	public function _list($query = null){		
		$list = [];
		$dbList = $this->db->query("SELECT * from ".$this->table." ".$query)->result();
		foreach($dbList as $row){
			foreach($row as $key => $value){
				// $value = trim(preg_replace('/\s+/', '\n', $value));
				$row->$key = str_replace('"', '\"', $value);
			}
			$list[] = $row;
		}
		return $list;
	}

	//check if value already exist
	public function _exist($column, $value){
		$value = strtolower($value);
		return $this->db->query("SELECT * FROM ".$this->table." WHERE LOWER(".$column.") = '".$value."'")->row();
	}

	
}
