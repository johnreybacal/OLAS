<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Book extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->librarianView('Book/index', '');
    }
        
    public function Add(){
        $this->librarianView('Book/Add', '', 1);       
    }
    
    public function Edit($id){
        $data['book'] = $this->bookCatalogue->_get($id);
        $this->librarianView('Book/Edit', $data, 1);
    }

    public function View($id){
        $data['book'] = $this->bookCatalogue->_get($id);
        $this->header();
        $this->load->view('Book/View', $data);
        $this->footer();
    }

    public function MarcImport(){
        $this->librarianView('Book/MarcImport', '');
    }

    public function Uncatalogued(){
        $this->librarianView('Book/Uncatalogued', '');
    }

    public function QR(){
        $this->librarianView('Book/QR', '');
    }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list() as $data){   
            $book = $this->book->_get($data->ISBN);                
            $json .= '['                
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$book->Title.'",'                                
                .'"'.$data->DateAcquired.'",'
                .'"'.$data->AcquiredFrom.'",'
                .'"<a href = \"'.base_url("Book/View/".$data->AccessionNumber).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-eye fa-2x\"></span></a><a href = \"'.base_url("Book/Edit/".$data->AccessionNumber).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateOPAC(){        
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list() as $data){   
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
                .'"<button onclick = \"Bookbag.add('.$data->AccessionNumber.','.$data->ISBN.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-plus fa-2x\"></span></button>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;  
    }

    public function GenerateTableComplete(){
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list("ORDER BY DateAcquired DESC") as $data){   
            $book = $this->book->_get($data->ISBN);   
            $s = $this->series->_get($book->SeriesId);
            $series = '';
            if(is_object($s)){
                $series = $s->Name;
            }             
            $json .= '['
                .'"'.$data->AccessionNumber.'",'
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$book->Title.'",'                
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getGenre($data->ISBN)).'",'                
                .'"'.$this->publisher->_get($book->PublisherId)->Name.'",'
                .'"'.$series.'",'
                .'"'.$book->Edition.'",'
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

    public function GenerateTableUncatalogued(){
        $json = '{ "data": [';
        foreach($this->marcImport->_list() as $data){               
            $json .= '['                                
                .'"'.$data->ISBN.'",'                
                .'"'.$data->Title.'",'                                                
                .'"<button onclick=\"Uncatalogued.add('.$data->MarcImportId.')\" class = \"btn btn-info\">Catalogue</button><button onclick=\"Uncatalogued.discard('.$data->MarcImportId.')\" class = \"btn btn-danger\">Discard</button>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    //get full details of book via isbn
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

    //get book via AccessionNumber
    public function GetByAccessionNumber($accessionNumber){
        echo $this->convert($this->book->_get($this->bookCatalogue->_get($accessionNumber)->ISBN));
    }

    //Get Catalogue of book
    public function GetCatalogue($accessionNumber){
        echo $this->convert($this->bookCatalogue->_get($accessionNumber));
    }

    //for same title so that the form will be automatically filled it same isbn is set
    public function LastAcquired($isbn){
        echo $this->convert($this->bookCatalogue->lastAcquired($isbn));        
    }
    
    public function Validate(){
        $book = $this->input->post('book');        
        $str = '{';
        $valid = true;
        //isbn
        if(!v::notEmpty()->validate($book['ISBN'])){
            $str .= $this->invalid('ISBN', 'ISBN is required');
            $valid = false;
        }
        //title
        if(!v::notEmpty()->validate($book['Title'])){
            $str .= $this->invalid('Title', 'Title is required');
            $valid = false;
        }
        //acquired from
        if(!v::notEmpty()->validate($book['AcquiredFrom'])){
            $str .= $this->invalid('AcquiredFrom', 'Please input the name of the supplier');
            $valid = false;
        }
        //call number
        if(!v::notEmpty()->validate($book['CallNumber'])){
            $str .= $this->invalid('CallNumber', 'Please add a Call Number');
            $valid = false;
        }
        else{
            $ifExist = $this->bookCatalogue->_exist('CallNumber', $book['CallNumber']);            
            if(is_object($ifExist)){
                if($ifExist->AccessionNumber != $book['AccessionNumber']){
                    $str .= $this->invalid('CallNumber', 'Call Number already exist');
                    $valid = false;
                }
            }
        }
        //price
        if(!v::intVal()->notEmpty()->validate($book['Price'])){
            $str .= $this->invalid('Price', 'Please input the cost of the book');
            $valid = false;
        } 
        else{
            if(!v::intVal()->min(0)->validate($book['Price'])){
                $str .= $this->invalid('Price', 'Price is invalid');
                $valid = false;
            } 
        }
        //multiple selectpickers
        if(array_key_exists('AuthorId', $book)){
            if(!v::arrayVal()->notEmpty()->validate($book['AuthorId'])){
                $str .= $this->invalid('SelectAuthorId', 'Please select at least one author');
                $valid = false;
            }
        }else{
            $str .= $this->invalid('SelectAuthorId', 'Please select at least one author');
            $valid = false;
        }
        if(array_key_exists('GenreId', $book)){
            if(!v::arrayVal()->notEmpty()->validate($book['GenreId'])){
                $str .= $this->invalid('SelectGenreId', 'Please select at least one genre');
                $valid = false;
            }
        }else{
            $str .= $this->invalid('SelectGenreId', 'Please select at least one genre');
            $valid = false;
        }
        if(array_key_exists('SubjectId', $book)){
            if(!v::arrayVal()->notEmpty()->validate($book['SubjectId'])){
                $str .= $this->invalid('SelectSubjectId', 'Please select at least one subject');
                $valid = false;
            }
        }else{
            $str .= $this->invalid('SelectSubjectId', 'Please select at least one subject');
            $valid = false;
        }
        //selectpickers
        if(!v::intVal()->notEmpty()->validate($book['PublisherId'])){
            $str .= $this->invalid('SelectPublisherId', 'Please select a publisher');
            $valid = false;
        }         
        //dates
        if(!v::date()->validate($book['DatePublished'])){            
            $str .= $this->invalid('DatePublished', 'Please input a date');
            $valid = false;
        }
        if(!v::date()->validate($book['DateAcquired'])){            
            $str .= $this->invalid('DateAcquired', 'Please input a date');
            $valid = false;
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function Save(){          
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

    public function UploadImage(){
        if(isset($_FILES['image']) && !empty($_FILES['image'])){
            if($_FILES['image']['error'] != 4){
                $config['upload_path'] = './assetsOLAS/img/book';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')){//lol imposibleng mag-error 'to
                    $error = array('error' => $this->upload->display_errors());            
                    print_r($error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $this->book->saveImage($this->input->post('ISBN'), $data['upload_data']['file_name']);
                    print_r($data);
                }
            }
        }    
    }

    public function ImportMarc(){
        $isbn = $this->input->post('marc')['isbn'];
        $title = $this->input->post('marc')['title'];
        for($i = 0; $i < count($isbn); $i++){
            $this->marcImport->save($isbn[$i], $title[$i]);
        }
        // print_r($this->input->post('marc'));
    }

    public function DiscardUncatalogued(){
        $this->marcImport->delete($this->input->post('MarcImportId'));
    }

    public function SetFlashdata(){        
        $this->session->set_flashdata(
            'uncatalogued', 
            $this->marcImport->_get($this->input->post('MarcImportId'))
        );  
        // print_r($this->marcImport->_get($this->input->post('MarcImportId')));
    }
   
}