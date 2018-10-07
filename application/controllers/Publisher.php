<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Publisher extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Publisher/index');
		$this->footer();
    }
    
    public function View($id){
        $data['publisher'] = $this->convert($this->publisher->_get($id));
        $this->header();
        $this->load->view('Publisher/View', $data);
        $this->footer();
    }
    
    // public function Add(){
    //     $this->header();
    //     $this->load->view('Publisher/Add');
    //     $this->footer();
    // }
    
    // public function MarcUpload(){
    //     $this->header();
    //     $this->load->view('Book/MarcUpload');
    //     $this->footer();
    // }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->publisher->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/Publisher/'.$data->PublisherId).'\'>'.$data->Name.'</a>",'
                .'"'.$data->Name.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Name.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('publisher'));
    }
    
}