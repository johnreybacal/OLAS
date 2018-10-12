<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Author extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Author/index');
		$this->footer();
	}

	public function View($id){
        $data['author'] = $this->convert($this->author->_get($id));
        $this->header();
        $this->load->view('Author/View', $data);
        $this->footer();
    }
	
	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->author->_list() as $data){
            $json .= '['
                .'"'.$data->Name.'",'
                .'"<button onclick=\"Author_Modal.edit('.$data->AuthorId.')\">Edit</button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

}