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
        $data['book'] = $this->book->convert($this->book->_get($id));
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
        foreach($this->book->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/View/'.$data->AccessionNumber).'\'>'.$data->AccessionNumber.'</a>",'
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'"'
            .']';            
            $json .= ',';
        }
        $json = substr($json, 0, strlen($json) - 1);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateTableComplete(){
        $json = '{ "data": [';
        foreach($this->book->_list() as $data){   
            $x = $this->bookDetails->_get($data->ISBN)[0];            
            $json .= '['
                .'"<a href = \''.base_url('Book/View/'.$data->AccessionNumber).'\'>'.$data->AccessionNumber.'</a>",'
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$x->Title.'",'                
                .'"'.$this->author->_get($x->AuthorId)[0]->Data.'",'                
                .'"'.$this->genre->_get($x->GenreId)[0]->Data.'",'                
                .'"'.$this->publisher->_get($x->PublisherId)[0]->Data.'",'                
                .'"'.$this->series->_get($x->SeriesId)[0]->Data.'",'                
                .'"'.$this->course->_get($x->CourseId)[0]->Data.'",'                
                .'"'.$this->subject->_get($x->SubjectId)[0]->Data.'",'                
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'"'
            .']';            
            $json .= ',';
        }
        $json = substr($json, 0, strlen($json) - 1);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('book'));
    }
    
}