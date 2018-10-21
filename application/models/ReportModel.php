<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends _BaseModel{

    public function totalBooks(){
		return $this->db->query("SELECT COUNT(AccessionNumber) as total from bookcatalogue WHERE IsActive = '1'")->row()->total;
	}

	public function totalBookCirculations(){
		return $this->db->query("SELECT COUNT(LoanId) as total from loan")->row()->total;
    }

    public function totalPatrons(){
		return $this->db->query("SELECT COUNT(PatronId) as total from patron")->row()->total;
    }
    
    public function totalOutsideResearchers(){
		return $this->db->query("SELECT COUNT(OutsideResearcherId) as total from outsideresearcher")->row()->total;
	}

}