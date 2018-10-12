<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Member extends _BaseController {

    public function __construct(){
		parent::__construct();
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Member/index');
		$this->footer();
    }
    
    public function Add(){
		$this->header();
		$this->load->view('Member/Add');
		$this->footer();
	}
	
	public function View($id){
        $data['member'] = $this->convert($this->member->_get($id));
        $this->header();
        $this->load->view('Member/View', $data);
        $this->footer();
    }

    public function Edit($id){
        $data['id'] = $this->convert($this->member->_get($id));
        $this->header();
        $this->load->view('Member/Edit', $data);
        $this->footer();
    }
    
    public function Authenticate(){
        // print_r($this->input->post('login')['Username']);
		print_r($this->member->authenticate(
            $this->input->post('login')['Username'],
            $this->input->post('login')['Password']
        ));
	}
	
	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->member->_list() as $data){
            $json .= '['
				.'"<a href = \''.base_url('Member/View/'.$data->MemberId).'\'>'.$data->MemberId.'</a>",'
                .'"'.$data->FirstName.'",'
                .'"'.$data->ContactNumber.'",'
                .'"'.$data->Username.'",'
                .'"'.$data->MemberTypeId.'",'
                .'"<button onclick = \"Member_Edit_Modal.edit('.$data->MemberId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
                // .'"<a href = \"'.base_url("Member/edit/".$data->MemberId).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Get($id){
        echo $this->convert($this->member->_get($id));
    }

    public function Save(){        
        $this->member->save($this->input->post('member'));
    }
}