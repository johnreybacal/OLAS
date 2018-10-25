<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Course extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
        $this->librarianView('Course/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->course->_list() as $data){
            $json .= '['
                .'"'.$this->college->_get($data->CollegeId)->Name.'", '
                .'"'.$data->Name.'", '
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"Course_Modal.edit('.$data->CourseId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GetAll(){
        echo $this->convert($this->course->_list());
    }

    public function Get($id){        
        echo $this->convert($this->course->_get($id));
    }

    public function Save(){        
        $this->course->save($this->input->post('course'));
    }

 
}