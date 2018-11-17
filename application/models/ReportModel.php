<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends _BaseModel{    

    public function totalBooks($filter = null){
		return $this->db->query("SELECT COUNT(AccessionNumber) as total from bookcatalogue WHERE IsActive = '1' ".$filter)->row()->total;
	}

	public function totalBookCirculations($filter = null){
		return $this->db->query("SELECT COUNT(LoanId) as total from loan ".$filter)->row()->total;
    }

    public function totalPatrons($filter = null){
		return $this->db->query("SELECT COUNT(PatronId) as total from patron ".$filter)->row()->total;
    }
    
    public function totalOutsideResearchers($filter = null){
		return $this->db->query("SELECT COUNT(OutsideResearcherId) as total from outsideresearcher ".$filter)->row()->total;
	}

}