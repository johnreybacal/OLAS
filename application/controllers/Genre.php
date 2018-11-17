<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Genre extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
        $this->librarianView('Genre/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->genre->_list() as $data){
            $json .= '['
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"Genre_Modal.edit('.$data->GenreId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GetAll(){        
        echo $this->convert($this->genre->_list());
    }

    public function Get($id){        
        echo $this->convert($this->genre->_get($id));
    }
    
    public function Validate(){
        $genre = $this->input->post('genre');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($genre['Name'])){
            $str .= $this->invalid('GenreName', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->genre->_exist('Name', $genre['Name']);            
            if(is_object($ifExist)){
                if($ifExist->GenreId != $genre['GenreId']){
                    $str .= $this->invalid('GenreName', 'Genre already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function Save(){        
        echo $this->genre->save($this->input->post('genre'));
    }

    
}