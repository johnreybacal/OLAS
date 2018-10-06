<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Course extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Course/index');
		$this->footer();
    }
    
    public function View($id){
        $data['course'] = $this->course->convert($this->course->_get($id));
        $this->header();
        $this->load->view('Course/View', $data);
        $this->footer();
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->course->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/Course/'.$data->CourseId).'\'>'.$data->Data.'</a>",'
                .'"'.$data->Data.'"'
            .']';            
            $json .= ',';
        }
        $json = substr($json, 0, strlen($json) - 1);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('course'));
    }
    
}