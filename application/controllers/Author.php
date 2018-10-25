<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Author extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){
        $this->librarianView('Author/index', '');
    }
    
	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->author->_list() as $data){
            $json .= '['
                .'"'.$data->Name.'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'                
                .'"<button onclick = \"Author_Modal.edit('.$data->AuthorId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'                
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GetAll(){        
        echo $this->convert($this->author->_list());
    }

    public function Get($id){        
        echo $this->convert($this->author->_get($id));
    }
    
    public function Save(){        
        $this->author->save($this->input->post('author'));
    }

    
}