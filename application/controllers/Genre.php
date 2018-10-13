<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Genre extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Genre/index');
		$this->footer();
    }
    
    public function View($id){
        $data['genre'] = $this->convert($this->genre->_get($id));
        $this->header();
        $this->load->view('Genre/View', $data);
        $this->footer();
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
    
    public function Save(){        
        $this->genre->save($this->input->post('genre'));
    }

    
}