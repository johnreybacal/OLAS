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
        foreach($this->subject->_list() as $subject){            
            $courses = [];
            $json .= '['                
                .'"'.$subject->Name.'","';
            foreach($this->subjectCourse->_list($subject->SubjectId) as $c){
                $courses[] = $c->CourseId;
                $course = $this->course->_get($c->CourseId);                    
                $json .= ' '.$course->Name.',';
            }
            $json = $this->removeExcessComma($json).'",'
                .'"'.$this->loopAll($this->college->getDistinct($courses)).'",'
<<<<<<< HEAD
                .'"<button onclick = \"Subject_Modal.edit('.$subject->SubjectId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'                
            .'],';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Get($id){
        echo $this->convert($this->subject->_get($id));
    }

    public function GetCourses($id){
        $str = '[';
        foreach($this->subjectCourse->_list($id) as $c){
            $str .= $c->CourseId.',';
        }
        echo $this->removeExcessComma($str).']';    
    }
    
    public function Save(){                                
        $s = $this->subject->save($this->input->post('subject'));
        $c = $this->input->post('subject')['CourseId'];
        $this->subjectCourse->save($s, $c);
    }
    
}