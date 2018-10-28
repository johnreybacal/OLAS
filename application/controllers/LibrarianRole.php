<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class LibrarianRole extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->librarianView('LibrarianRole/index', '');
    }

    public function Validate(){
        $librarianrole = $this->input->post('librarianrole');        
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($librarianrole['Name'])){
            $str .= $this->invalid('Name', 'Name is required');
            $valid = false;
        }
        else{
            $ifExist = $this->librarianrole->_exist('Name', $librarianrole['Name']);            
            if(is_object($ifExist)){
                if($ifExist->LibrarianRoleId != $librarianrole['LibrarianRoleId']){
                    $str .= $this->invalid('Name', 'Role already exists');
                    $valid = false;
                }
            }
        }  
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->librarianrole->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('LibrarianRole/View/'.$data->LibrarianRoleId).'\'>'.$data->LibrarianRoleId.'</a>",'
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"LibrarianRole_Modal.edit('.$data->LibrarianRoleId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GetAll(){
        echo $this->convert($this->librarianrole->_list());
    }

    public function Get($id){
        echo $this->convert($this->librarianrole->_get($id));
    }

    public function Save(){        
        $this->librarianrole->save($this->input->post('librarianrole'));
    }
    
}