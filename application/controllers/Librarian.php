<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Librarian extends _BaseController {

    public function __construct(){
		parent::__construct();
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Librarian/index');
		$this->footer();
	}
	
	public function View($id){
        $data['librarian'] = $this->convert($this->librarian->_get($id));
        $this->header();
        $this->load->view('Librarian/View', $data);
        $this->footer();
    }
    
    public function Authenticate(){
        // print_r($this->input->post('login')['Username']);
		print_r($this->librarian->authenticate(
            $this->input->post('login')['Username'],
            $this->input->post('login')['Password']
        ));
	}
	
	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->librarian->_list() as $data){
            $json .= '['
				.'"<a href = \''.base_url('Librarian/View/'.$data->LibrarianId).'\'>'.$data->LibrarianId.'</a>",'
                .'"'.$data->LibrarianRoleId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Username.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

}