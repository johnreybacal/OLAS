<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Report extends _BaseController {
    
    private $dateFrom = '';
    private $dateTo = '';

    public function __construct(){
		parent::__construct();
    }

    private function DateRange($column){
        return $column." BETWEEN '".$this->dateFrom."' AND '".$this->dateTo."' ";
    }

    private function TotalToNow($column){
        return $column." BETWEEN '0001-01-01' AND '".$this->dateTo."'";
    }        

    public function Filter(){
        $str = '{';
        $filter = $this->input->post('filter');
        $this->dateFrom = $filter['DateFrom'];
        $this->dateTo = $filter['DateTo'];
        
        $str .= '"totalBooks":'.$this->report->totalBooks("AND ".$this->TotalToNow('DateAcquired'));
        
        $str .= ',"totalBooksAcquired":'.$this->report->totalBooks("AND ".$this->DateRange('DateAcquired'));
        
        $str .= ',"totalBookCirculations":'.$this->report->totalBookCirculations("WHERE ".$this->DateRange('DateBorrowed'));
        
        $str .= ',"totalPatrons":'.$this->report->totalPatrons("WHERE ".$this->TotalToNow('DateCreated'));
        
        $str .= ',"patronsRegistered":'.$this->report->totalPatrons("WHERE ".$this->DateRange('DateCreated'));
        
        $str .= ',"totalOutsideResearchers":'.$this->report->totalOutsideResearchers("WHERE ".$this->DateRange('DateTime'));
        
        $str .= '}';
        echo $str;
    }

    public function GenerateTable(){
        $filter = '';
        if(v::date()->validate($this->dateFrom)){
            $filter = "WHERE ".$this->DateRange('DateAcquired');
        }
        echo $this->dateFrom;
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list($filter."ORDER BY DateAcquired DESC") as $data){   
            $book = $this->book->_get($data->ISBN);               
            $json .= '['
                .'"'.$data->AccessionNumber.'",'
                .'"'.$book->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$book->Title.'",'                                
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTableFiltered($from, $to){        
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list("WHERE DateAcquired BETWEEN '".$from."' AND '".$to."' ORDER BY DateAcquired DESC") as $data){   
            $book = $this->book->_get($data->ISBN);               
            $json .= '['
                .'"'.$data->AccessionNumber.'",'
                .'"'.$book->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$book->Title.'",'                                
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTableBookIssueHistory($accessionNumber, $patronType, $from = null, $to = null){
        $json = '{ "data": [';
        $additionalCondition = '';
        if($patronType != 0){
            $additionalCondition = " AND PatronId IN (SELECT PatronId from patron WHERE PatronTypeId = '".$patronType."')";
        }
        if($from != null){
            $additionalCondition .= " AND DateBorrowed BETWEEN '".$from."' AND '".$to."'";
        }
        foreach($this->loan->_list("WHERE AccessionNumber = '".$accessionNumber."'".$additionalCondition) as $data){
            $patron = $this->patron->_get($data->PatronId);                        
            $json .= '['
                .'"'.$patron->LastName.', '.$patron->FirstName.'",'
                .'"'.$this->patronType->_get($patron->PatronTypeId)->Name.'",'                
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTablePatronIssueHistory($patronId, $from = null, $to = null){
        $json = '{ "data": [';            
        $additionalCondition = '';      
        if($from != null){
            $additionalCondition = " AND DateBorrowed BETWEEN '".$from."' AND '".$to."'";
        }
        foreach($this->loan->_list("WHERE PatronId = '".$patronId."'".$additionalCondition) as $data){
            $book = $this->book->_get($this->bookCatalogue->_get($data->AccessionNumber)->ISBN);
            $json .= '['                
                .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($book->ISBN)).'",'
                .'"'.$book->CallNumber.'",'
                .'"'.$data->AccessionNumber.'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'",'
                .'"'.$data->AmountPayed.'",'
                .'"'.$this->bookStatus->_get($data->BookStatusId)->Name.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;     
    }

}
