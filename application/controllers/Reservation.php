<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');

class Reservation extends _BaseController {
    
    public function __construct(){
        parent::__construct();		
    }   

    public function index(){
        $this->librarianView('Reservation/index', '');
    }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->reservation->_list() as $data){            
            $isbn = $this->bookCatalogue->_get($data->AccessionNumber)->ISBN;
            $member = $this->member->_get($data->MemberId);            
            $json .= '['                
                .'"'.$member->LastName.', '.$member->FirstName.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->DateReserved.'"'                
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Save(){        
        $this->reservation->save($this->input->post('reservation'));
    }

    
}