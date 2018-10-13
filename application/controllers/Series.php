<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Series extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Series/index');
		$this->footer();
    }
    
    public function View($id){
        $data['series'] = $this->convert($this->series->_get($id));
        $this->header();
        $this->load->view('Series/View', $data);
        $this->footer();
    }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->series->_list() as $data){
            $json .= '['                
                .'"'.$data->Name.'",'
                .'"'.$data->IsActive.'",'
                .'"<button onclick = \"Series_Modal.edit('.$data->SeriesId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GetAll(){        
        echo $this->convert($this->series->_list());
    }

    public function Get($id){        
        echo $this->convert($this->series->_get($id));
    }
    
    public function Save(){        
        $this->series->save($this->input->post('series'));
    }
    
    
}