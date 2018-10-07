<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class LibrarianRole extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('LibrarianRole/index');
		$this->footer();
    }
    
    public function View($id){
        $data['librarianRole'] = $this->convert($this->librarianrole->_get($id));
        $this->header();
        $this->load->view('LibrarianRole/View', $data);
        $this->footer();
    }
    
    // .'"<button onclick = var.method()\''.base_url('LibrarianRole/View/'.$data->LibrarianRoleId).'\'>'.$data->Name.'</a>",'
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->librarianrole->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('LibrarianRole/View/'.$data->LibrarianRoleId).'\'>'.$data->LibrarianRoleId.'</a>",'
                .'"'.$data->Name.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->librarianrole->save($this->input->post('librarianrole'));
    }
    
}