<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoanHistoryModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"loanhistory",
				"LoanHistoryId",
			)
		);
	}

	public function save($loanhistory){
		if($loanhistory['LoanHistoryId'] == 0){//insert			
			$this->db->query("INSERT into loanhistory "
				."(Data) VALUES ("                   
					."'".$loanhistory['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE loanhistory SET "
                ."Data = '".$loanhistory['Data']."'"
                ."WHERE LoanHistoryId = '".$loanhistory['LoanHistoryId']."'"
			);			
		}
    }	
    
}