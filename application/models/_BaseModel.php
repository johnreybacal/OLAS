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

	public function _get($id){
		$dbList = $this->db->query("SELECT * from ".$this->table." WHERE ".$this->identifier." = '".$id."'")->row();
		return $dbList;		
	}

	public function _list(){
		$dbList = $this->db->query("SELECT * from ".$this->table)->result();
		return $dbList;
	}

}
