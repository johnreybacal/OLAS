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
		if(array_key_exists('LoanId', $loan)){
			if($loan['LoanId'] == 0){//insert			
				$this->insert($loan);
			}
			else{//update
				if($loan['BookStatusId'] != 1){//when issued is not selected
					$this->returnBook($loan);
				}else{
					$this->update($loan);
				}
			}
		}else{
			$this->insert($loan);
		}
	}

	public function insert($loan){
		$this->db->query("INSERT into loan "
			."(PatronId, AccessionNumber, DateBorrowed, DateDue, DateReturned, AmountPayed, BookStatusId, IsRecalled) VALUES ("
				."'".$loan['PatronId']."',"
				."'".$loan['AccessionNumber']."',"
				."CURRENT_TIMESTAMP,"
				."date_add(CURRENT_TIMESTAMP, INTERVAL 3 DAY),"
				."NULL,"
				."NULL,"
				."'1',"
				."'0'"
			.")"
		);
		$this->db->query("UPDATE bookcatalogue SET IsAvailable = '0' WHERE AccessionNumber = '".$loan['AccessionNumber']."'");
	}

	public function update($loan){
		$this->db->query("UPDATE loan SET "
			."PatronId = '".$loan['PatronId']."', "
			."AccessionNumber = '".$loan['AccessionNumber']."', "
			."DateBorrowed = '".$loan['DateBorrowed']."', "
			."DateDue = '".$loan['DateDue']."', "
			."DateReturned = '".$loan['DateReturned']."', "
			."AmountPayed = '".$loan['AmountPayed']."', "
			."BookStatusId = '".$loan['BookStatusId']."' "
			."WHERE LoanId = '".$loan['LoanId']."'"
		);	
		$this->db->query("UPDATE bookcatalogue SET Notes = '".$loan["Notes"]."'  WHERE AccessionNumber = '".$loan['AccessionNumber']."'");
	}

	public function returnBook($loan){		
		$this->db->query("UPDATE loan SET "			
			."DateBorrowed = '".$loan['DateBorrowed']."', "
			."DateDue = '".$loan['DateDue']."', "
			."DateReturned = CURRENT_TIMESTAMP, "
			."AmountPayed = '".$loan['AmountPayed']."', "
			."BookStatusId = '".$loan['BookStatusId']."' "
			."WHERE LoanId = '".$loan['LoanId']."'"
		);			
		$available = ($loan['BookStatusId'] != 4) ? 1 : 0;//marks book unavaible when lost
		$this->db->query("UPDATE bookcatalogue SET IsAvailable = '".$available."', Notes = '".$loan["Notes"]."'  WHERE AccessionNumber = '".$loan['AccessionNumber']."'");		
	}

	public function recall($loanId){
		$this->db->query("UPDATE loan SET IsRecalled = '1' WHERE LoanId = '".$loanId."'");
	}

	public function unrecall($loanId){
		$this->db->query("UPDATE loan SET IsRecalled = '0' WHERE LoanId = '".$loanId."'");
	}
	
	public function checkIssueExist($accessionNumber){
		$result = $this->db->query("SELECT * From loan where AccessionNumber = '".$accessionNumber."' AND BookStatusId = '1'")->row();
		return is_object($result) ? "1" : "0";		
	}

	public function getLoanByAccession($accessionNumber){
		return $this->db->query("SELECT * From loan where AccessionNumber = '".$accessionNumber."' AND BookStatusId = '1'")->row();
	}
    
}