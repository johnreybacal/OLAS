<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class OutsideResearcher extends _BaseController {
    
    public function __construct(){
        parent::__construct();		
    }
    
    public function index(){
        $this->librarianView('OutsideResearcher/index', '');
    }        
    
	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->outsideResearcher->_list() as $data){
            $json .= '['
                .'"'.$data->Name.'",'
                .'"'.$this->loopAll($this->outsideResearcher->getSubject($data->OutsideResearcherId)).'",'
                .'"'.$data->DateTime.'",'
                .'"'.$data->AmountPayed.'",'                        
                .'"<button onclick = \"OutsideResearcher_Modal.edit('.$data->OutsideResearcherId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'                
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GetAll(){        
        echo $this->convert($this->outsideResearcher->_list());
    }

    public function Get($id){        
        echo '{"OutsideResearcher":';        
        echo $this->convert($this->outsideResearcher->_get($id));                
        echo ', "subject":';
        echo $this->convert($this->outsideResearcherSubject->_list($id));
        echo '}';   
    }
    
    public function Validate(){
        $outsideResearcher = $this->input->post('outsideResearcher');
        $str = '{';
        $valid = true;
        if(!v::notEmpty()->validate($outsideResearcher['Name'])){
            $str .= $this->invalid('Name', 'Please input a value');;
            $valid = false;
        }
        if(array_key_exists('SubjectId', $outsideResearcher)){
            if(!v::arrayVal()->notEmpty()->validate($outsideResearcher['SubjectId'])){
                $str .= $this->invalid('SubjectId', 'Please select at least one subject');
                $valid = false;
            }
        }else{
            $str .= $this->invalid('SubjectId', 'Please select at least one subject');
            $valid = false;
        }
        if(!v::date()->validate($outsideResearcher['DateTime'])){            
            $str .= $this->invalid('DateTime', 'Please input a date');
            $valid = false;
        }        
        if(!v::intVal()->notEmpty()->validate($outsideResearcher['AmountPayed'])){
            $str .= $this->invalid('AmountPayed', 'Please input the amount payed');
            $valid = false;
        } 
        else{
            if(!v::intVal()->min(0)->validate($outsideResearcher['AmountPayed'])){
                $str .= $this->invalid('AmountPayed', 'Input is invalid');
                $valid = false;
            } 
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
    }

    public function Save(){
        $outsideResearcher = $this->input->post('outsideResearcher');
        $outsideResearcherId = $this->outsideResearcher->save($outsideResearcher);
        $this->outsideResearcherSubject->save($outsideResearcherId, $outsideResearcher['SubjectId']);
    }

    
}