<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class College extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->librarianView('College/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->college->_list() as $data){
            $json .= '['                
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"College_Modal.edit('.$data->CollegeId.');\" class = \"btn btn-md btn-flat btn-info\" title=\"Edit\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Validate(){
        $college = $this->input->post('college');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($college['Name'])){
            $str .= $this->invalid('Name', 'Please input a value');
            $valid = false;
        }
        else {
            $ifExist = $this->college->_exist('Name', $college['Name']);            
            if(is_object($ifExist)){
                if($ifExist->CollegeId != $college['CollegeId']){
                    $str .= $this->invalid('Name', 'College already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function GetAll(){        
        echo $this->convert($this->college->_list());
    }

    public function Get($id){        
        echo $this->convert($this->college->_get($id));
    }
    
    public function Save(){        
        echo $this->college->save($this->input->post('college'));
    }

   
}