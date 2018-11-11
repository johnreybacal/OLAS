<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Series extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->librarianView('Series/index', '');
    }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->series->_list() as $data){
            $json .= '['                
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
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
    
    public function Validate(){
        $series = $this->input->post('series');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($series['Name'])){
            $str .= $this->invalid('SeriesName', 'Please input a value');
            $valid = false;
        }
        else{
            $ifExist = $this->series->_exist('Name', $series['Name']);            
            if(is_object($ifExist)){
                if($ifExist->SeriesId != $series['SeriesId']){
                    $str .= $this->invalid('SeriesName', 'Series already exist');
                    $valid = false;
                }
            }
        }        
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function Save(){        
        echo $this->series->save($this->input->post('series'));
    }
    
    
}