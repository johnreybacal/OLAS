<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Subject extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->librarianView('Subject/index', '');
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->subject->_list() as $data){            
            $courses = [];
            $json .= '['                
                .'"'.$data->Name.'","';
            foreach($this->subjectCourse->_list($data->SubjectId) as $c){
                $courses[] = $c->CourseId;
                $course = $this->course->_get($c->CourseId);                    
                $json .= ' '.$course->Name.',';
            }
            $json = $this->removeExcessComma($json).'",'
                .'"'.$this->loopAll($this->college->getDistinct($courses)).'",'
                .'"'.($data->IsActive ? '<span class =\"badge badge-success\">Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"Subject_Modal.edit('.$data->SubjectId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'                
            .'],';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GetAll(){        
        echo $this->convert($this->subject->_list());
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
    
    public function Validate(){
        $subject = $this->input->post('subject');        
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($subject['Name'])){
            $str .= '"Name":"'.$this->invalid('Please input a value').'",';
            $valid = false;
        }
        else if($this->subject->_exist('Name', $subject['Name'])->SubjectId != $subject['SubjectId']){
            $str .= '"Name":"'.$this->invalid('Subject already exist').'",';
            $valid = false;
        }
        if(array_key_exists('CourseId', $subject)){
            if(!v::arrayVal()->notEmpty()->validate($subject['CourseId'])){
                $str .= '"CourseId":"'.$this->invalid('Please select a course').'",';
                $valid = false;
            }
        }else{
            $str .= '"CourseId":"'.$this->invalid('Please select a course').'",';
            $valid = false;
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }
    
    public function Save(){                                
        $s = $this->subject->save($this->input->post('subject'));
        $c = $this->input->post('subject')['CourseId'];
        $this->subjectCourse->save($s, $c);
    }

    
}