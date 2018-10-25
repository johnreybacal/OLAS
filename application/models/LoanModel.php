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
				."(MemberId, AccessionNumber, DateBorrowed, DateDue, DateReturned, AmountPayed, BookStatusId) VALUES ("                   
					."'".$loan['MemberId']."',"
					."'".$loan['AccessionNumber']."',"
					."'".$loan['DateBorrowed']."',"
					."'".$loan['DateDue']."',"
					."NULL,"
					."NULL,"
					."'1',"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE loan SET "
                ."MemberId = '".$loan['MemberId']."', "
                ."AccessionNumber = '".$loan['AccessionNumber']."', "
                ."DateBorrowed = '".$loan['DateBorrowed']."', "
                ."DateDue = '".$loan['DateDue']."', "
                ."DateReturned = '".$loan['DateReturned']."', "
                ."AmountPayed = '".$loan['AmountPayed']."', "
                ."BookStatusId = '".$loan['BookStatusId']."' "
                ."WHERE LoanId = '".$loan['LoanId']."'"
			);			
		}
	}
    
}