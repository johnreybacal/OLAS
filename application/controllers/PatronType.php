<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class PatronType extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
        $this->librarianView('PatronType/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->patrontype->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('PatronType/View/'.$data->PatronTypeId).'\'>'.$data->PatronTypeId.'</a>",'
                .'"'.$data->Name.'",'
                .'"'.$data->NumberOfBooks.'",'
                .'"'.$data->NumberOfDays.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                // .'"'.($data->IsActive == true ? '<span class = \"badge badge-success"\>Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"PatronType_Modal.edit('.$data->PatronTypeId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Get($id){
        echo $this->convert($this->patrontype->_get($id));
    }

    public function GetAll(){
        echo $this->convert($this->patrontype->_list());
    }

    public function Save(){        
        $this->patrontype->save($this->input->post('patrontype'));
    }
    
}