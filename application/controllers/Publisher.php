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

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->publisher->_list() as $data){
            $json .= '['
                .'"'.$data->Name.'",'
                .'"<button onclick=\"Publisher_Modal.edit('.$data->PublisherId.')\">Edit</button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GetAll(){        
        echo $this->convert($this->publisher->_list());
    }

    public function Get($id){        
        echo $this->convert($this->publisher->_get($id));
    }
    
    public function Save(){        
        $this->publisher->save($this->input->post('publisher'));
    }
    
}