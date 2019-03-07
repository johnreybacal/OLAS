<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
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
                .'"<div onclick = \"Reservation_Modal.edit('.$data->ReservationId.')\" style= \"cursor:pointer;\">'.$data->Expiration.'</div>",'
                .'"<button onclick = \"Reservation.issue('.$data->ReservationId.');\" class = \"btn btn-md btn-flat btn-success\" title=\"Reserve\"><span class = \"fa fa-check fa-2x\"></span></button><button onclick = \"Reservation.discard('.$data->ReservationId.');\" class = \"btn btn-md btn-flat btn-danger\" title=\"Discard\"><span class = \"fa fa-trash fa-2x\"></span></button>"'
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
        $this->NotifyPatron($this->loan->_get($loanId)->PatronId, 'Book ', 'Please enjoy your book'.$this->book->_get($this->bookCatalogue->_get($loan->AccessionNumber)->ISBN)->Title.' Thank you.');
    }

    public function Discard($reservationId){
        $this->reservation->discard($reservationId);
    }
    
    public function Limit(){
        echo '{';
            echo '"reserved":"'.$this->reservation->checkReservation().'",';
            echo '"total":"'.$this->cart->total_items().'"';
        echo '}';
    }

    public function Get($id){
        echo $this->convert($this->reservation->_get($id));
    }

    public function UpdateExpiry(){
        $this->reservation->update($this->input->post('reservation'));
    }

    public function Validate(){
        $reservation = $this->input->post('reservation');
        $str = '{';
        $valid = true;
        
        if($reservation['ReservationId'] != 0){
            if(!v::date()->validate($reservation['Expiration'])){            
                $str .= $this->invalid('DateDue', 'Please input a date');
                $valid = false;
            }
        } 
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function AllData(){
        $json = '{ "data": [';
        foreach($this->reservation->_list("WHERE IsActive = '1'") as $data){            
            $isbn = $this->bookCatalogue->_get($data->AccessionNumber)->ISBN;
            $patron = $this->patron->_get($data->PatronId);            
            $json .= '['      
                .'"'.$data->ReservationId.'",'
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$isbn.'",'
                .'"'.$this->book->_get($isbn)->Title.'",'
                .'"'.$data->Expiration.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }    

}