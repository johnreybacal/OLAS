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
                .'"<button onclick=\"Genre_Modal.edit('.$data->GenreId.')\">Edit</button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('genre'));
    }
    
}