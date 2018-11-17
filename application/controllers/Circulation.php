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
    
    public function Issued(){
        $this->librarianView('Circulation/Issued', '');
    }    
    
    public function History(){
        $this->librarianView('Circulation/History', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->loan->_list() as $data){            
            $isbn = $this->bookCatalogue->_get($data->AccessionNumber)->ISBN;
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['                
                .'"'.$data->LoanId.'",'
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$data->AccessionNumber.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'",'                
                .'"<button onclick = \"Circulation_Modal.edit('.$data->LoanId.');\"class=\"btn btn-info mx-2 btn-md btn-flat\"><span class=\"fa fa-edit fa-2x\"></span>Edit</button>'
                .($data->BookStatusId == 1 
                    ? '<button onclick = \"Circulation_Modal.return('.$data->LoanId.')\" class=\"btn btn-info mx-2 btn-md btn-flat\"><span class=\"ionicons ion-refresh fa-2x\"></span>Return</button>'
                    : '')
                .($data->BookStatusId == 1 ? ($data->IsRecalled == 0) 
                    ? '<button onclick = \"Circulation.recall('.$data->LoanId.')\" class=\"btn btn-info btn-md btn-flat\"><span class=\"ionicons ion-arrow-return-left fa-2x\">Recall</span></button>' : '<button onclick = \"Circulation.unrecall('.$data->LoanId.')\" class=\"btn btn-info btn-md btn-flat\"><span class=\"ionicons ion-arrow-return-right fa-2x\">Unrecall</span></button>'
                    : '')
                .'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTableIssued(){
        $json = '{ "data": [';
        foreach($this->loan->_list("WHERE BookStatusId = '1'") as $data){            
            $isbn = $this->bookCatalogue->_get($data->AccessionNumber)->ISBN;
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['                
                .'"'.$data->LoanId.'",'
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$data->AccessionNumber.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'                                
                .'"<button onclick = \"Circulation_Modal.edit('.$data->LoanId.');\"class=\"btn btn-info mx-2 btn-md btn-flat\"><span class=\"fa fa-edit fa-2x\"></span>Edit</button>",'                
                .'"<button onclick = \"Circulation_Modal.return('.$data->LoanId.')\" class=\"btn btn-info mx-2 btn-md btn-flat\"><span class=\"ionicons ion-refresh fa-2x\"></span>Return</button>",'      
                .(($data->IsRecalled == 0) 
                    ? '"<button onclick = \"Circulation.recall('.$data->LoanId.')\" class=\"btn btn-info btn-md btn-flat\"><span class=\"ionicons ion-arrow-return-left fa-2x\">Recall</span></button>"'
                    : '"<button onclick = \"Circulation.unrecall('.$data->LoanId.')\" class=\"btn btn-info btn-md btn-flat\"><span class=\"ionicons ion-arrow-return-right fa-2x\">Unrecall</span></button>"')
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTableHistory(){
        $json = '{ "data": [';
        foreach($this->loan->_list("WHERE BookStatusId != '1'") as $data){            
            $isbn = $this->bookCatalogue->_get($data->AccessionNumber)->ISBN;
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['        
                .'"'.$data->LoanId.'",'        
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$data->AccessionNumber.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'",'                
                .'"<button onclick = \"Circulation_Modal.edit('.$data->LoanId.');\"class=\"btn btn-info mx-2 btn-md btn-flat\"><span class=\"fa fa-edit fa-2x\"></span></button>"'                
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
        $loan = $this->loan->_get($loanId);
        $this->NotifyPatron(
            $loan->PatronId,
            'Your book is being recalled by the library',
            'Please immediately return the book: '.$this->book->_get($this->bookCatalogue->_get($loan->AccessionNumber)->ISBN)->Title.' to the library. Thank you.'
        );        
    }

    public function Unrecall($loanId){
        $this->loan->unrecall($loanId);
        $this->NotifyPatron($this->loan->_get($loanId)->PatronId, 'Recall cancelled', 'Please enjoy your book');
    }

}