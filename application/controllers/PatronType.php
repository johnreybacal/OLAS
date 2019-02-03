<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class PatronType extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
        $this->librarianView('PatronType/index', '');
    }
    
    public function Validate(){
        $patronType = $this->input->post('patronType');        
        $str = '{';
        $valid = true;
        // Name noofbooks nooodays

        //name
        if(!v::notEmpty()->validate($patronType['Name'])){
            $str .= $this->invalid('Name', 'Name is required');
            $valid = false;
        }
        else{
            $ifExist = $this->patronType->_exist('Name', $patronType['Name']);            
            if(is_object($ifExist)){
                if($ifExist->PatronTypeId != $patronType['PatronTypeId']){
                    $str .= $this->invalid('Name', 'Patron Type already exists');
                    $valid = false;
                }
            }
        }  

        //numofbooks
        if(!v::notEmpty()->validate($patronType['NumberOfBooks'])){
            $str .= $this->invalid('NumberOfBooks', 'Number of books is required');
            $valid = false;
        }
        else{
            if(!v::digit()->validate($patronType['NumberOfBooks'])){
                $str .= $this->invalid('NumberOfBooks', 'Enter an integer');
                $valid = false;
            }
            if(!v::length(2)->validate($patronType['NumberOfBooks'])){
                $str .= $this->invalid('NumberOfBooks', 'Value must be less than or equal to 99.');
                $valid = false;
            }
            if(!v::min(0)->validate($patronType['NumberOfBooks'])){
                $str .= $this->invalid('NumberOfBooks', 'Value must be greater than or equal to 0.');
                $valid = false;
            }
        }
        //numofdays
        if(!v::notEmpty()->validate($patronType['NumberOfDays'])){
            $str .= $this->invalid('NumberOfDays', 'Number of days is required');
            $valid = false;
        }
        else{
            // if(!v::intVal()->notEmpty()->validate("0"));{
            //     $valid = false;
            // } //dapat iaaccept yung 0 na input kaso not working
            if(!v::length(1,4)->validate($patronType['NumberOfDays'])){
                $str .= $this->invalid('NumberOfDays', 'Value must be less than or equal to 9999.');
                $valid = false;
            }
            if(!v::min(0)->validate($patronType['NumberOfDays'])){
                $str .= $this->invalid('NumberOfDays', 'Value must be greater than or equal to 0.');
                $valid = false;
            }
        }
        //end
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->patronType->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('PatronType/View/'.$data->PatronTypeId).'\'>'.$data->PatronTypeId.'</a>",'
                .'"'.$data->Name.'",'
                .'"'.$data->NumberOfBooks.'",'
                .'"'.$data->NumberOfDays.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                // .'"'.($data->IsActive == true ? '<span class = \"badge badge-success"\>Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"PatronType_Modal.edit('.$data->PatronTypeId.');\" class = \"btn btn-md btn-flat btn-info\" title=\"Edit\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Get($id){
        echo $this->convert($this->patronType->_get($id));
    }

    public function GetAll(){
        echo $this->convert($this->patronType->_list());
    }

    public function Save(){        
        $this->patronType->save($this->input->post('patronType'));
    }
    
}