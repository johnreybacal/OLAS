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
        $data['subject'] = $this->convert($this->subject->_get($id));
        $this->header();
        $this->load->view('Subject/View', $data);
        $this->footer();
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->subjectCourse->_list() as $data){
            $subject = $this->subject->_get($data->SubjectId);
            $course = $this->course->_get($data->CourseId);
            $college = $this->college->_get($course->CollegeId);
            $json .= '['                
                .'"<a href = \''.base_url('College/View/'.$college->CollegeId).'\'>'.$college->Name.'</a>",'                
                .'"<a href = \''.base_url('Course/View/'.$course->CourseId).'\'>'.$course->Name.'</a>",'                
                .'"<a href = \''.base_url('Subject/View/'.$subject->SubjectId).'\'>'.$subject->Name.'</a>"'                
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('subject'));
    }
    
}