<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Book extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Book/index');
		$this->footer();
    }
    
    public function View($id){
        $data['book'] = $this->convert($this->book->_get($id));
        $this->header();
        $this->load->view('Book/View', $data);
        $this->footer();
    }
    
    public function Add(){
        $this->header();
        $this->load->view('Book/Add');
        $this->footer();
    }
    
    public function MarcUpload(){
        $this->header();
        $this->load->view('Book/MarcUpload');
        $this->footer();
    }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/View/'.$data->AccessionNumber).'\'>'.$data->AccessionNumber.'</a>",'
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTableComplete(){
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list() as $data){   
            $x = $this->book->_get($data->ISBN)[0];    
            $series = $this->series->_get($x->SeriesId);
            $json .= '['
                .'"<a href = \''.base_url('Book/View/'.$data->AccessionNumber).'\'>'.$data->AccessionNumber.'</a>",'
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$x->Title.'",'                
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getGenre($data->ISBN)).'",'                
                .'"'.$this->publisher->_get($x->PublisherId)[0]->Name.'",'
                .'"'.(is_array($series) ? $series[0]->Name : "").'",'
                .'"'.$x->Edition.'",'
                .'"'.$this->loopAll($this->book->getSubject($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getCourse($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getCollege($data->ISBN)).'",'
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('book'));
    }
    
}