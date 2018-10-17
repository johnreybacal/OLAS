<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Bookbag extends _BaseController {
    
    public function __construct(){
        parent::__construct();		
    }

    public function index(){
        $this->header();
        $this->load->view('Bookbag/index');
        $this->footer();
    }

    public function Add($id){
        //id = accession number
        $ok = true;//chect if book is already in bookbag
        foreach($this->cart->contents() as $book){
            if($id == $book['id']){
                $ok = false;
                break;
            }
        }
        if($ok){
            $book = array('id' => $id, 'qty' => 1, 'price' => 1, 'name' => '1');
            $this->cart->insert($book);
            echo '1';
        }else{
            echo '0';
        }
    }
    
    public function Remove($id){
        $this->cart->remove($id);
    }
    
    public function RemoveAll(){
        $this->cart->destroy();
    }

    public function Get(){
        echo $this->convert($this->cart->contents());
    }


    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->cart->contents() as $item){
            $data = $this->bookCatalogue->_get($item['id']);
            $book = $this->book->_get($data->ISBN);
            $json .= '['                
                .'"'.$book->Title.'",'
                .'"'.$this->loopAll($this->book->getAuthor($data->ISBN)).'",'
                .'"'.$this->loopAll($this->book->getGenre($data->ISBN)).'",'                 
                .'"'.$this->series->_get($book->SeriesId)->Name.'",'
                .'"'.$book->Edition.'",'
                .'"'.$this->loopAll($this->book->getSubject($data->ISBN)).'",'
                .'"'.$data->CallNumber.'",'
                .'"<button onclick = \"Bookbag.remove(\''.$item['rowid'].'\');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-trash fa-2x\"></span></button>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;  
    }
  
}