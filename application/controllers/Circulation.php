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
    
    public function BookIssueHistory(){
        $this->librarianView('Circulation/BookIssueHistory', '');
    }
    
    public function PatronIssueHistory(){
        $this->librarianView('Circulation/PatronIssueHistory', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->loan->_list() as $data){            
            $book = $this->book->_get($this->bookCatalogue->_get($data->AccessionNumber)->ISBN);
            $patron = $this->patron->_get($data->PatronId);
            $json .= '['                
                .'"'.$data->LoanId.'",'
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$this->formatAccessionNumber($data->AccessionNumber).'",'                
                .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($book->ISBN)).'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'",'                
                .'"<button onclick = \"Circulation_Modal.edit('.$data->LoanId.');\"class=\"btn btn-info btn-md btn-flat\" title=\"Edit\"><span class=\"fa fa-edit fa-2x\"></span>Edit</button>'
                .($data->BookStatusId == 1 
                    ? '<button onclick = \"Circulation_Modal.return('.$data->LoanId.')\" class=\"btn btn-info btn-md btn-flat\"><span class=\"ionicons ion-refresh fa-2x\" title=\"Return\"></span>Return</button>'
                    : '')
                .($data->BookStatusId == 1 ? ($data->IsRecalled == 0) 
                    ? '<button onclick = \"Circulation.recall('.$data->LoanId.')\" class=\"btn btn-info btn-md btn-flat\" title=\"Recall\"><span class=\"ionicons ion-arrow-return-left fa-2x\">Recall</span></button>' : '<button onclick = \"Circulation.unrecall('.$data->LoanId.')\" class=\"btn btn-info btn-md btn-flat\" title=\"Unrecall\"><span class=\"ionicons ion-arrow-return-right fa-2x\">Unrecall</span></button>'
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
            $book = $this->book->_get($this->bookCatalogue->_get($data->AccessionNumber)->ISBN);
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['                                
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($book->ISBN)).'",'
                .'"'.$book->CallNumber.'",'
                .'"'.$this->formatAccessionNumber($data->AccessionNumber).'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'                                
                .'"<button onclick = \"Circulation_Modal.edit('.$data->LoanId.');\"class=\"btn btn-info btn-flat\"><span class=\"fa fa-edit fa-2x\" title=\"Edit\"></span></button><button onclick = \"Circulation_Modal.return('.$data->LoanId.')\" class=\"btn btn-success\" title=\"Return\">Return</button>",'      
                .(($data->IsRecalled == 0) 
                    ? '"<button onclick = \"Circulation.recall('.$data->LoanId.')\" class=\"btn btn-danger btn-md\" title=\"Recall\">Recall</span></button>"'                    
                    : '"<button onclick = \"Circulation.unrecall('.$data->LoanId.')\" class=\"btn btn-info btn-md\" title=\"Unrecall\">Unrecall</span></button>"')                    
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Allbooks(){
        $books = $this->loan->_list("WHERE BookStatusId = '1'");
        foreach($books as $data){
            $book[] = $data->DateDue;
            $due = strtotime($data->DateDue);
            $now = strtotime(date("Y-m-d h:i:sa"));

            if($due == $now || $due < $now){
                $loanId = $data->LoanId;
                $this->loan->recall($loanId);
                $loan = $this->loan->_get($loanId);
                $this->NotifyPatron(
                    $loan->PatronId,
                    'Your book is being recalled by the library',
                    'Please immediately return the book: '.$this->book->_get($this->bookCatalogue->_get($loan->AccessionNumber)->ISBN)->Title.' to the library. Thank you.'
                );    
            }
        }
    }

    public function GenerateTableHistory($from = null, $to = null){
        $json = '{ "data": [';
        $additionalCondition = '';
        if($from != null){
            $additionalCondition .= " AND DateBorrowed BETWEEN '".$from."' AND '".$to."'";
        }
        foreach($this->loan->_list("WHERE BookStatusId != '1'".$additionalCondition) as $data){            
            $book = $this->book->_get($this->bookCatalogue->_get($data->AccessionNumber)->ISBN);
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($book->ISBN)).'",'
                .'"'.$book->CallNumber.'",'
                .'"'.$this->formatAccessionNumber($data->AccessionNumber).'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'",'                
                .'"<button onclick = \"Circulation_Modal.edit('.$data->LoanId.');\"class=\"btn btn-info btn-md btn-flat\" title=\"Edit\"><span class=\"fa fa-edit fa-2x\"></span></button>"'                
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
            $str .= $this->invalid('AccessionNumber', 'Please choose a book to issue');
            $valid = false;
        }
        if(!v::notEmpty()->validate($loan['PatronId'])){
            $str .= $this->invalid('PatronId', 'Please choose a patron');
            $valid = false;
        }
        if(!v::date()->validate($loan['DateBorrowed'])){            
            $str .= $this->invalid('DateBorrowed', 'Please input a date');
            $valid = false;
        }
        if($loan['LoanId'] != 0){
            if(!v::date()->validate($loan['DateDue'])){            
                $str .= $this->invalid('DateDue', 'Please input a date');
                $valid = false;
            }
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
    
    public function CheckIssueExist($accessionNumber){
        echo $this->loan->checkIssueExist($accessionNumber);
    }

    public function ScanQR($accessionNumber){
        echo $this->convert($this->loan->getLoanByAccession($accessionNumber));
    }

}