<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Subject extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Subject/index');
		$this->footer();
    }
    
    public function View($id){
        $data['subject'] = $this->subject->convert($this->subject->_get($id));
        $this->header();
        $this->load->view('Subject/View', $data);
        $this->footer();
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->subject->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/Subject/'.$data->SubjectId).'\'>'.$data->Data.'</a>",'
                .'"'.$data->Data.'"'
            .']';            
            $json .= ',';
        }
        $json = substr($json, 0, strlen($json) - 1);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('subject'));
    }
    
}