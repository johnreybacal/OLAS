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
        foreach($this->reservation->_list("WHERE IsActive = '1'") as $data){            
            $isbn = $this->bookCatalogue->_get($data->AccessionNumber)->ISBN;
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['                
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->DateReserved.'",'
                .'"<button onclick = \"Reservation.issue('.$data->ReservationId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-check fa-2x\"></span></button><button onclick = \"Reservation.discard('.$data->ReservationId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-trash fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }    

    public function Save(){ 
        foreach($this->cart->contents() as $book){
            $this->reservation->save(array(
                'PatronId' => $this->session->userdata('patronId'),
                'AccessionNumber' => $book['id']
            ));
        }
    }

    public function Issue($reservationId){
        $c = $this->reservation->_get($reservationId);
        $this->loan->save((array)$c);
        $this->reservation->setInactive($reservationId);
    }

    public function Discard($reservationId){
        $this->reservation->discard($reservationId);
    }
    
}