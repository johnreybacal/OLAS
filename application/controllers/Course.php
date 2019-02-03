<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
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
                .'"<button onclick = \"Course_Modal.edit('.$data->CourseId.');\" class = \"btn btn-md btn-flat btn-info\" title=\"Edit\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Validate(){
        $course = $this->input->post('course');        
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($course['Name'])){
            $str .= $this->invalid('Name', 'Please input a value');
            $valid = false;
        }
        else{
            $ifExist = $this->course->_exist('Name', $course['Name']);            
            if(is_object($ifExist)){
                if($ifExist->CourseId != $course['CourseId']){
                    $str .= $this->invalid('Name', 'Course already exist');
                    $valid = false;
                }
            }
        }        
        if(!v::intVal()->notEmpty()->validate($course['CollegeId'])){
            $str .= $this->invalid('CollegeId', 'Please select a college');
            $valid = false;
        }        
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function GetAll(){
        echo $this->convert($this->course->_list());
    }

    public function Get($id){        
        echo $this->convert($this->course->_get($id));
    }

    public function Save(){        
        echo $this->course->save($this->input->post('course'));
    }

 
}