<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class College extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('College/index');
		$this->footer();
    }
    
    public function View($id){
        $data['college'] = $this->convert($this->college->_get($id));
        $this->header();
        $this->load->view('College/View', $data);
        $this->footer();
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->college->_list() as $data){
            $json .= '['                
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"College_Modal.edit('.$data->CollegeId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GetAll(){        
        echo $this->convert($this->college->_list());
    }

    public function Get($id){        
        echo $this->convert($this->college->_get($id));
    }
    
    public function Save(){        
        $this->college->save($this->input->post('college'));
    }

   
}