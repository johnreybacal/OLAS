<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Section extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
        $this->librarianView('Section/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->section->_list() as $data){
            $json .= '['
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"Section_Modal.edit('.$data->SectionId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GetAll(){        
        echo $this->convert($this->section->_list());
    }

    public function Get($id){        
        echo $this->convert($this->section->_get($id));
    }
    
    public function Validate(){
        $section = $this->input->post('section');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($section['Name'])){
            $str .= $this->invalid('SectionName', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->section->_exist('Name', $section['Name']);            
            if(is_object($ifExist)){
                if($ifExist->SectionId != $section['SectionId']){
                    $str .= $this->invalid('SectionName', 'Section already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function Save(){        
        echo $this->section->save($this->input->post('section'));
    }

    
}