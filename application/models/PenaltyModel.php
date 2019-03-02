<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenaltyModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"penalty",
				"PenaltyId",
			)
		);
	}

	public function save($penalty){
		if($penalty['PenaltyId'] == 0){//insert			
			$this->db->query("INSERT into penalty "
				."(PatronId, LoanId, Status) VALUES ("                   
					."'".$penalty['PatronId']."',"
					."'".$penalty['LoanId']."',"					
					."'0'"
				.")"
			);			
		}
		else{//update
			$this->db->query("UPDATE penalty SET "
                ."PatronId = '".$penalty['PatronId']."',"
                ."LoanId = '".$penalty['LoanId']."',"
                ."Status = '".$penalty['Status']."' "
                ."WHERE PenaltyId = '".$penalty['PenaltyId']."'"
			);					
		}
    }	

    public function patronClearance($patronId){
        return ($this->db->query("SELECT Count(PenaltyId) AS count FROM penalty WHERE PatronId = '".$patronId."' AND Status = '0'")->row()->count == 0) ? "Cleared" : "Not Cleared";
    }

    public function clear($penaltyId){
        $this->db->query("UPDATE penalty SET Status = '1' WHERE PenaltyId = '".$penaltyId."'");	
    }

}