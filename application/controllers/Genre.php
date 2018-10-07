<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Genre extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Genre/index');
		$this->footer();
    }
    
    public function View($id){
        $data['genre'] = $this->convert($this->genre->_get($id));
        $this->header();
        $this->load->view('Genre/View', $data);
        $this->footer();
    }
    
    // public function Add(){
    //     $this->header();
    //     $this->load->view('Genre/Add');
    //     $this->footer();
    // }
    
    // public function MarcUpload(){
    //     $this->header();
    //     $this->load->view('Book/MarcUpload');
    //     $this->footer();
    // }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->genre->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/Genre/'.$data->GenreId).'\'>'.$data->Data.'</a>",'
                .'"'.$data->Data.'",'
                .'"'.$data->Data.'",'
                .'"'.$data->Data.'",'
                .'"'.$data->Data.'",'
                .'"'.$data->Data.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('genre'));
    }
    
}