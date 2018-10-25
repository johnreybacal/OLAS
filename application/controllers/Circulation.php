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
            $patron = $this->patron->_get($data->MemberId);            
            $json .= '['                
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'",'                
                .'"edit, return, recall"'
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

   
}