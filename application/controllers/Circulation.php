<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Circulation extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->librarianView('Circulation/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->loan->_list() as $data){            
            $isbn = $this->bookCatalogue->_get($data->AccessionNumber)->ISBN;
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['                
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$data->AccessionNumber.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'",'                
                .'"edit, return '.(($data->IsRecalled == 0) ? '<button onclick = \"Circulation.recall('.$data->LoanId.')\" class=\"btn\">Recall</button>' : '<button onclick = \"Circulation.unrecall('.$data->LoanId.')\" class=\"btn\">Unrecall</button>').'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Get($id){        
        echo $this->convert($this->loan->_get($id));
    }
    
    public function Save(){        
        $this->loan->save($this->input->post('loan'));
    }

    public function ReturnBook(){
        $loan = $this->input->post('loan');
        $this->loan->returnBook($this->loan->_get($loan['LoanId']), $loan['AmountPayed'], $loan['BookStatusId']);
    }

    public function Recall($loanId){
        $this->loan->recall($loanId);
        //sena, send email at sms sa patron na nirerecall ang libro
        //ito ang mga need mong data :>
        // $patron = $this->patron->_get($this->loan->_get($loanId)->PatronId);
        // $patron->Email;
        // $patrin->ContactNumber        
        //wag mong sirain ang master pls
    }

    public function Unrecall($loanId){
        $this->loan->unrecall($loanId);
        //sena, send email at sms sa patron na hindi na pala nirerecall ang libro
        //ito ang mga need mong data :>
        // $patron = $this->patron->_get($this->loan->_get($loanId)->PatronId);
        // $patron->Email;
        // $patrin->ContactNumber        
        //wag mong sirain ang master pls
    }


   
}