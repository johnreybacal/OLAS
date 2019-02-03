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
        $librarianRole = $this->input->post('librarianRole');        
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($librarianRole['Name'])){
            $str .= $this->invalid('Name', 'Name is required');
            $valid = false;
        }
        else{
            $ifExist = $this->librarianRole->_exist('Name', $librarianRole['Name']);            
            if(is_object($ifExist)){
                if($ifExist->LibrarianRoleId != $librarianRole['LibrarianRoleId']){
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
        foreach($this->librarianRole->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('LibrarianRole/View/'.$data->LibrarianRoleId).'\'>'.$data->LibrarianRoleId.'</a>",'
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"LibrarianRole_Modal.edit('.$data->LibrarianRoleId.');\" class = \"btn btn-md btn-flat btn-info\" title=\"title\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GetAll(){
        echo $this->convert($this->librarianRole->_list());
    }

    public function Get($id){
        echo $this->convert($this->librarianRole->_get($id));
    }

    public function Save(){        
        $this->librarianRole->save($this->input->post('librarianRole'));
    }
    
}