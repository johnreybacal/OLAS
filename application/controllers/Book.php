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
        $this->librarianView('Book/Add', '');
    }
    
    public function Edit($id){
        $data['book'] = $this->bookCatalogue->_get($id);
        $this->librarianView('Book/Edit', $data);
    }

    public function View($id){
        $data['book'] = $this->bookCatalogue->_get($id);
        $this->librarianView('Book/View', $data);
    }

    public function MarcUpload(){
        $this->librarianView('Book/MarcUpload', '');
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
            $json .= '['                
                .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getGenre($data->ISBN)).'",'                 
                .'"'.$this->series->_get($book->SeriesId)->Name.'",'
                .'"'.$book->Edition.'",'
                .'"'.$this->loopAll($this->book->getSubject($data->ISBN)).'",'
                .'"'.$data->CallNumber.'",'
                .'"<button onclick = \"Bookbag.add('.$data->AccessionNumber.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-plus fa-2x\"></span></button>"'
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
            $book = $this->book->_get($data->ISBN);                
            $json .= '['
                .'"'.$data->AccessionNumber.'",'
                .'"'.$data->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$book->Title.'",'                
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getGenre($data->ISBN)).'",'                
                .'"'.$this->publisher->_get($book->PublisherId)->Name.'",'
                .'"'.$this->series->_get($book->SeriesId)->Name.'",'
                .'"'.$book->Edition.'",'
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
    
    public function Validate(){
        $book = $this->input->post('book');        
        $str = '{';
        $valid = true;
        //isbn
        if(!v::notEmpty()->validate($book['ISBN'])){
            $str .= '"ISBN":"'.$this->invalid('ISBN is required').'",';
            $valid = false;
        }
        //title
        if(!v::notEmpty()->validate($book['Title'])){
            $str .= '"Title":"'.$this->invalid('Title is required').'",';
            $valid = false;
        }
        //acquired from
        if(!v::notEmpty()->validate($book['AcquiredFrom'])){
            $str .= '"AcquiredFrom":"'.$this->invalid('Please input a value').'",';
            $valid = false;
        }
        //call number
        if(!v::notEmpty()->validate($book['CallNumber'])){
            $str .= '"CallNumber":"'.$this->invalid('Please input a value').'",';
            $valid = false;
        }
        else{
            $bookCatalogue = $this->bookCatalogue->_exist('CallNumber', $book['CallNumber']);            
            if(is_object($bookCatalogue)){
                if($bookCatalogue->AccessionNumber != $book['AccessionNumber']){
                    $str .= '"CallNumber":"'.$this->invalid('Call Number already exist').'",';
                    $valid = false;
                }
            }
        }
        //price
        if(!v::intVal()->notEmpty()->validate($book['Price'])){
            $str .= '"Price":"'.$this->invalid('Please input a value').'",';
            $valid = false;
        } 
        else{
            if(!v::intVal()->min(0)->validate($book['Price'])){
                $str .= '"Price":"'.$this->invalid('Invalid Price').'",';
                $valid = false;
            } 
        }
        //multiple selectpickers
        if(array_key_exists('AuthorId', $book)){
            if(!v::arrayVal()->notEmpty()->validate($book['AuthorId'])){
                $str .= '"AuthorId":"'.$this->invalid('Please select an author').'",';
                $valid = false;
            }
        }else{
            $str .= '"AuthorId":"'.$this->invalid('Please select an author').'",';
            $valid = false;
        }
        if(array_key_exists('GenreId', $book)){
            if(!v::arrayVal()->notEmpty()->validate($book['GenreId'])){
                $str .= '"GenreId":"'.$this->invalid('Please select a genre').'",';
                $valid = false;
            }
        }else{
            $str .= '"GenreId":"'.$this->invalid('Please select a genre').'",';
            $valid = false;
        }
        if(array_key_exists('SubjectId', $book)){
            if(!v::arrayVal()->notEmpty()->validate($book['SubjectId'])){
                $str .= '"SubjectId":"'.$this->invalid('Please select a subject').'",';
                $valid = false;
            }
        }else{
            $str .= '"SubjectId":"'.$this->invalid('Please select a subject').'",';
            $valid = false;
        }
        //selectpickers
        if(!v::intVal()->notEmpty()->validate($book['PublisherId'])){
            $str .= '"PublisherId":"'.$this->invalid('Please select a publisher').'",';
            $valid = false;
        }  
        if(!v::intVal()->notEmpty()->validate($book['SeriesId'])){
            $str .= '"SeriesId":"'.$this->invalid('Please select a series').'",';
            $valid = false;
        }  
        //dates
        if(!v::date()->validate($book['DatePublished'])){            
            $str .= '"DatePublished":"'.$this->invalid('Please input a date').'",';
            $valid = false;
        }
        if(!v::date()->validate($book['DateAcquired'])){            
            $str .= '"DateAcquired":"'.$this->invalid('Please input a date').'",';
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
}