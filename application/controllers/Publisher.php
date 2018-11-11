<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Publisher extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->librarianView('Publisher/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->publisher->_list() as $data){
            $json .= '['
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"Publisher_Modal.edit('.$data->PublisherId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
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
    
    public function Validate(){
        $publisher = $this->input->post('publisher');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($publisher['Name'])){
            $str .= $this->invalid('PublisherName', 'Please input a value');;
            $valid = false;
        }
        else{
            $ifExist = $this->publisher->_exist('Name', $publisher['Name']);            
            if(is_object($ifExist)){
                if($ifExist->PublisherId != $publisher['PublisherId']){
                    $str .= $this->invalid('PublisherName', 'Publisher already exist');
                    $valid = false;
                }
            }
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function Save(){        
        echo $this->publisher->save($this->input->post('publisher'));
    }

    
}