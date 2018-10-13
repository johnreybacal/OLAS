<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class MemberType extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('MemberType/index');
		$this->footer();
    }
    
    public function View($id){
        $data['membertype'] = $this->convert($this->membertype->_get($id));
        $this->header();
        $this->load->view('MemberType/View', $data);
        $this->footer();
    }

    public function Validate(){
        
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->membertype->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('MemberType/View/'.$data->MemberTypeId).'\'>'.$data->MemberTypeId.'</a>",'
                .'"'.$data->Name.'",'
                .'"'.$data->NumberOfBooks.'",'
                .'"'.$data->NumberOfDays.'",'
                .'"'.$data->IsActive.'",'
                // .'"'.($data->IsActive == true ? '<span class = \"badge badge-success"\>Active</span>' : '<span class = \"badge badge-danger\">Inactive</span>').'",'
                .'"<button onclick = \"MemberType_Modal.edit('.$data->MemberTypeId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Get($id){
        echo $this->convert($this->membertype->_get($id));
    }

    public function GetAll(){
        echo $this->convert($this->membertype->_list());
    }

    public function Save(){        
        $this->membertype->save($this->input->post('membertype'));
    }
    
}