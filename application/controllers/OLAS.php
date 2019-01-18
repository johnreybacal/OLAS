<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');

class OLAS extends _BaseController {


	public function __construct(){
		parent::__construct();		
	}

	public function index()
	{		
		foreach($this->bookCatalogue->_list("ORDER BY DateAcquired DESC LIMIT 5") as $b){						
			$data['books'][] = array(
				$b,
				'book' => $this->book->_get($b->ISBN),
				'author' => $this->book->getAuthor($b->ISBN),
				'genre' => $this->book->getGenre($b->ISBN),
				'subject' => $this->book->getSubject($b->ISBN),
				'reservation' => $this->reservation->isReserved($b->AccessionNumber)
			);
		}
		$data['authors'] = $this->author->_list("LIMIT 5");
		$this->header();		
		$this->load->view('OLAS/index', $data);
		$this->footer();				
	}

	public function MyReservations(){
		$this->header();
		$this->load->view('OLAS/MyReservations');
		$this->footer();
	}
	
	public function MyBooks(){
		$this->header();
		$this->load->view('OLAS/MyBooks');
		$this->footer();
	}

	public function About(){
		$this->header();
		$this->load->view('OLAS/About');
		$this->footer();
	}

	public function Developers(){
		$this->header();
		$this->load->view('OLAS/Developers');
		$this->footer();
	}
	
	public function GenerateTableMyReservations(){
        $json = '{ "data": [';
        foreach($this->reservation->_list("WHERE PatronId = '".$this->session->userdata('patronId')."' AND IsDiscarded = '0' AND IsActive = '1'") as $item){
            $data = $this->bookCatalogue->_get($item->AccessionNumber);
			$book = $this->book->_get($data->ISBN);
			$s = $this->series->_get($book->SeriesId);
            $series = '';
            if(is_object($s)){
                $series = $s->Name;
            }
            $json .= '['                
                .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getGenre($data->ISBN)).'",'                 
                .'"'.$series.'",'
                .'"'.$book->Edition.'",'
                .'"'.$this->loopAll($this->book->getSubject($data->ISBN)).'",'
                .'"'.$data->CallNumber.'",'
                .'"<button class=\"btn btn-danger\" onclick=\"MyReservations.discard('.$item->ReservationId.')\">Discard</button>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;  
    }
	
	public function GenerateTableMyBooks($currentIssued){
		$query = '';
		if($currentIssued){
			$query = "AND BookStatusId = '1'";
		}else{
			$query = "AND BookStatusId != '1'";			
		}
        $json = '{ "data": [';
        foreach($this->loan->_list("WHERE PatronId = '".$this->session->userdata('patronId')."' ".$query) as $item){
            $data = $this->bookCatalogue->_get($item->AccessionNumber);
            $book = $this->book->_get($data->ISBN);
            $json .= '['                
                .'"'.$book->Title.'",'                
                .'"'.$data->CallNumber.'",'
                .'"'.$item->DateBorrowed.'",'
                .'"'.$item->DateDue.'",'
                .'"'.$item->DateReturned.'",'
                .'"'.$item->AmountPayed.'",'
                .'""'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;  
    }
	
}
