<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
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
                .'"<button onclick = \"Circulation_Modal.edit('.$data->LoanId.')\" class=\"btn\">Edit</button>'
                .'<button onclick = \"Circulation_Modal.return('.$data->LoanId.')\" class=\"btn\">Return</button>'
                .($data->BookStatusId == 1 ? ($data->IsRecalled == 0) 
                    ? '<button onclick = \"Circulation.recall('.$data->LoanId.')\" class=\"btn\">Recall</button>' : '<button onclick = \"Circulation.unrecall('.$data->LoanId.')\" class=\"btn\">Unrecall</button>'
                    : '')
                .'"'
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

    // book status selectpicker
    public function BookStatusList(){
        echo $this->convert($this->bookStatus->_list());
    }

    public function Validate(){
        $loan = $this->input->post('loan');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($loan['AccessionNumber'])){
            $str .= $this->invalid('AccessionNumber', 'Please input the Accession Number of the book');
            $valid = false;
        }
        if(!v::date()->validate($loan['DateBorrowed'])){            
            $str .= $this->invalid('DateBorrowed', 'Please input a date');
            $valid = false;
        }
        if(!v::date()->validate($loan['DateDue'])){            
            $str .= $this->invalid('DateDue', 'Please input a date');
            $valid = false;
        }
        if(!v::notEmpty()->validate($loan['BookStatusId'])){
            $str .= $this->invalid('BookStatusId', 'Please select the status of the issued book');
            $valid = false;
        }
        else if($loan['BookStatusId'] != 1){//returned, lost, damaged validation
            if(!v::date()->validate($loan['DateReturned'])){
                $str .= $this->invalid('DateReturned', 'Please input a date');
                $valid = false;
            }
            if($loan['BookStatusId'] != 2){//hindi returned, either damaged or lost
                if(!v::intVal()->notEmpty()->validate($loan['AmountPayed'])){
                    $str .= $this->invalid('AmountPayed', 'Please input the penalty cost');
                    $valid = false;
                } 
                else{
                    if(!v::intVal()->min(0)->validate($loan['AmountPayed'])){
                        $str .= $this->invalid('AmountPayed', 'Penalty cost is invalid');
                        $valid = false;
                    } 
                }
            }
        }   
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
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