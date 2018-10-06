<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoanModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"loan",
				"loanId",
			)
		);
	}

	public function save($loan){
		if($loan['LoanId'] == 0){//insert			
			$this->db->query("INSERT into loan "
				."(Data) VALUES ("                   
					."'".$loan['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE loan SET "
                ."Data = '".$loan['Data']."'"
                ."WHERE LoanId = '".$loan['LoanId']."'"
			);			
		}
    }	
    
}