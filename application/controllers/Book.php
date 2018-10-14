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
        
    public function Add(){
        $this->header();
        $this->load->view('Book/Add');
        $this->footer();
    }
    
    public function Edit($id){
        $data['book'] = $this->bookCatalogue->_get($id);
        $this->header();
        $this->load->view('Book/Edit', $data);
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
            $x = $this->book->_get($data->ISBN);                
            $json .= '['
                .'"'.$data->AccessionNumber.'",'
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$x->Title.'",'                
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getGenre($data->ISBN)).'",'                
                .'"'.$this->publisher->_get($x->PublisherId)->Name.'",'
                .'"'.$this->series->_get($x->SeriesId)->Name.'",'
                .'"'.$x->Edition.'",'
                .'"'.$this->loopAll($this->book->getSubject($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getCourse($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getCollege($data->ISBN)).'",'
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'",'
                .'"<a href = \"'.base_url("Book/Edit/".$data->AccessionNumber).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Get($isbn){        
        $book = $this->book->_get($isbn);
        if($book != null){
            echo '{"book":';
            echo $this->convert($book);
            echo ', "author":';
            echo $this->convert($this->bookAuthor->_list($isbn));
            echo ', "genre":';
            echo $this->convert($this->bookGenre->_list($isbn));
            echo ', "subject":';
            echo $this->convert($this->bookSubject->_list($isbn));
            echo '}';        
        }else{
            echo '0';
        }
    }
    
    public function Save(){  
        // print_r($this->input->post('book'));
        $book = $this->input->post('book');        
        $isbn = $book['ISBN'];
        $author = $book['AuthorId'];
        $genre = $book['GenreId'];
        $subject = $book['SubjectId'];
        $this->bookCatalogue->save($book);
        $this->book->save($book);        
        $this->bookAuthor->save($isbn, $author);
        $this->bookGenre->save($isbn, $genre);
        $this->bookSubject->save($isbn, $subject);                
    }
}