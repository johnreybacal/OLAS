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
        $data['AccessionNumber'] = $this->bookCatalogue->getLastAccession();
        $this->librarianView('Book/Add', $data, 1);       
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

    public function PrintQR(){
        $this->librarianView('Circulation/QR', '');
    }

    // public function QR_Scan(){
    //     $this->librarianView('Book/QR_Scan', '');
    //     $this->librarianView('Circulation/QRFab', '');
    //     $this->librarianView('Circulation/QR_script', '');
    // }

    public function GenerateTable($from = null, $to = null){
        $json = '{ "data": [';
        $additionalCondition = '';
        if($from != null){
            $additionalCondition .= "WHERE DateAcquired BETWEEN '".$from."' AND '".$to."'";
        }
        foreach($this->bookCatalogue->_list($additionalCondition) as $data){   
            $book = $this->book->_get($data->ISBN);                
            $json .= '['                
                .'"'.$data->AccessionNumber.'",'                
                .'"<a href = \''.base_url('Book/View/'.$data->AccessionNumber).'\'>'.$book->Title.'</a>",'    
                // .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$book->CallNumber.'",'
                .'"'.$data->DateAcquired.'",'                
                .'"'.($data->IsAvailable == 1 ? '<span class=\"badge badge-success\">In</span>' : '<span class=\"badge badge-danger\">Out</span>').'",'                
                .'"<a href = \"'.base_url("Book/Edit/".$data->AccessionNumber).'\" class = \"btn btn-md btn-flat btn-info\" title=\"Edit\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
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
                .'"'.$this->section->_get($data->SectionId)->Name.'",'                 
                .'"'.$series.'",'
                .'"'.$book->Edition.'",'
                .'"'.$this->loopAll($this->book->getSubject($data->ISBN)).'",'
                .'"'.$book->CallNumber.'",'
                .'"<button onclick = \"Bookbag.add('.$data->AccessionNumber.','.$data->ISBN.');\" class = \"btn btn-md btn-flat btn-info\" title=\"Add\"><span class = \"fa fa-plus fa-2x\"></span></button>"'
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
                .'"'.$book->CallNumber.'",'
                .'"'.$data->ISBN.'",'                
                .'"'.$book->Title.'",'                
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->section->_get($data->SectionId)->Name.'",'                
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
                .'"'.$data->Author.'",'                                                
                .'"'.$data->CallNumber.'",'                                                
                .'"<button onclick=\"Uncatalogued.add('.$data->MarcImportId.')\" class = \"btn btn-info\" title=\"Add\">Catalogue</button><button onclick=\"Uncatalogued.discard('.$data->MarcImportId.')\" class = \"btn btn-danger ml-3\" title=\"Discard\">Discard</button>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GenerateTableCopies($isbn){
        $json = '{ "data": [';
        foreach($this->bookCatalogue->_list("WHERE ISBN = '".$isbn."'") as $data){               
            $book = $this->book->_get($isbn);   
            $reservation = $this->reservation->isReserved($data->AccessionNumber);
            $json .= '['                                
                // .'"'.$book->Title.'",'                                                
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$book->CallNumber.'",'                                                
                .'"'.$data->AccessionNumber.'",';
            //check room use
            if($data->IsRoomUseOnly == 0){
                //check availability
                if($data->IsAvailable == 1){
                    //check if patron is logged in
                    if($this->session->has_userdata('isPatron')){
                        //check if book is reserved
                        if($reservation['IsReserved'] == 1){
                            //check if current patron reserved the book
                            if($reservation['PatronId'] == $this->session->userdata('patronId')){
                                //reserved by current patron
                                $json .= '"<span class=\"badge badge-warning mx-1\" style=\"text-transform: uppercase;\">Already Reserved</span>"';
                            }
                            else{
                                //reserved by someone else
                                $json .= '"<span class=\"badge badge-warning mx-1\" style=\"text-transform: uppercase;\">Reserved</span>"';
                            }
                        }
                        else{
                            //add to bookbag
                            $json .= '"<span class=\"badge badge-success mx-1\" style=\"text-transform: uppercase;\">In</span><a class=\"hover-primary\" data-provide=\"tooltip\" href=\"#\" title=\"Add to bookbag\" onclick = \"Bookbag.add('.$data->AccessionNumber.','.$isbn.');\"><span class=\"badge badge-primary mx-1\">Add to Bookbag</span></a>"';
                            
                        }
                    }else{
                        $json .= '"<span class=\"badge badge-success mx-1\" style=\"text-transform: uppercase;\">In</span>"';
                    }
                }
                else{
                    //out
                    $json .= '"<span class=\"badge badge-danger mx-1\" style=\"text-transform: uppercase;\">Out</span>"';
                }
            }else{
                $json .= '"<span class=\"badge badge-success mx-1\" style=\"text-transform: uppercase;\">In</span><span class=\"badge badge-info\" style=\"text-transform: uppercase;\">Room use only</span>"';
                //room use only
            }
            $json .= ']';             
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

    public function CheckRoomUseOnly($accessionNumber){
        echo $this->bookCatalogue->_get($accessionNumber)->IsRoomUseOnly;
    }

    //Get Catalogue of book
    public function GetCatalogue($accessionNumber){
        echo $this->convert($this->bookCatalogue->_get($accessionNumber));
    }

    public function GetCatalogueByISBN($isbn){
        echo $this->convert($this->bookCatalogue->getByISBN($isbn, 0));
    }
    
    public function GetCatalogueByISBNAvailable($isbn){
        echo $this->convert($this->bookCatalogue->getByISBN($isbn, 1));
    }

    public function GetAll(){
        echo $this->convert($this->book->_list());
    }

    //for same title so that the form will be automatically filled it same isbn is set
    public function LastAcquired($isbn){
        echo $this->convert($this->bookCatalogue->lastAcquired($isbn));        
    }
    
    public function Validate(){
        $book = $this->input->post('book');        
        $str = '{';
        $valid = true;
        //accession number
        if(!v::notEmpty()->validate($book['AccessionNumber'])){
            $str .= $this->invalid('AccessionNumber', 'Accession Number is required');
            $valid = false;
        }
        else{
            // print_r($this->bookCatalogue->_exist('AccessionNumber', $book['AccessionNumber']));
            $ifExist = $this->bookCatalogue->_exist('AccessionNumber', $book['AccessionNumber']);
            if(is_object($ifExist)){
                if($ifExist->AccessionNumber == $book['AccessionNumber']){
                    if(array_key_exists('AccessionNumberCurrent', $book)){
                        if($book['AccessionNumber'] != $book['AccessionNumberCurrent']){
                            $str .= $this->invalid('AccessionNumber', 'Accession Number is already taken');
                            $valid = false;
                        }
                    }
                    else{
                        $str .= $this->invalid('AccessionNumber', 'Accession Number is already taken');
                        $valid = false;
                    }
                }
            }
            // }
        }
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
        //place published
        if(!v::notEmpty()->validate($book['PlacePublished'])){
            $str .= $this->invalid('PlacePublished', 'Please input the place of publication');
            $valid = false;
        }
        //call number
        if(!v::notEmpty()->validate($book['CallNumber'])){
            $str .= $this->invalid('CallNumber', 'Please add a Call Number');
            $valid = false;
        }                        
        //price
        if(!v::intVal()->validate($book['Price'])){
            $str .= $this->invalid('Price', 'Please input the cost of the book');
            $valid = false;
        } 
        else{
            if(!v::intVal()->min(0, true)->validate($book['Price'])){
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
        if(!v::intVal()->notEmpty()->validate($book['SectionId'])){
            $str .= $this->invalid('SelectSectionId', 'Please select a section');
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

    public function Insert(){                  
        $book = $this->input->post('book');        
        $isbn = $book['ISBN'];
        $author = $book['AuthorId'];        
        $subject = $book['SubjectId'];        
        $this->bookCatalogue->save($book, true);
        $this->book->save($book);        
        $this->bookAuthor->save($isbn, $author);        
        $this->bookSubject->save($isbn, $subject);           
    }
    
    public function Update(){                  
        $book = $this->input->post('book');        
        $isbn = $book['ISBN'];
        $author = $book['AuthorId'];        
        $subject = $book['SubjectId'];        
        $this->bookCatalogue->save($book, false);
        $this->book->save($book);        
        $this->bookAuthor->save($isbn, $author);        
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
        $ISBN = $this->input->post('marc')['ISBN'];
        $Title = $this->input->post('marc')['Title'];
        $CallNumber = $this->input->post('marc')['CallNumber'];
        $Author = $this->input->post('marc')['Author'];
        $Series = $this->input->post('marc')['Series'];
        $Publisher = $this->input->post('marc')['Publisher'];
        $YearPublished = $this->input->post('marc')['YearPublished'];
        $PlaceOfPublication = $this->input->post('marc')['PlaceOfPublication'];
        $Extent = $this->input->post('marc')['Extent'];
        $Other = $this->input->post('marc')['Other'];
        $Size = $this->input->post('marc')['Size'];
        for($i = 0; $i < count($ISBN); $i++){
            $this->marcImport->save(
                $ISBN[$i],
                $Title[$i],
                $CallNumber[$i],
                $Author[$i],
                $Series[$i],
                $Publisher[$i],
                $YearPublished[$i],
                $PlaceOfPublication[$i],
                $Extent[$i],
                $Other[$i],
                $Size[$i]
            );
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