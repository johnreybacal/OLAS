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
        $data['membertype'] = $this->membertype->convert($this->membertype->_get($id));
        $this->header();
        $this->load->view('MemberType/View', $data);
        $this->footer();
    }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->membertype->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('MemberType/View/'.$data->MemberTypeId).'\'>'.$data->Name.'</a>",'
                // .'"<button onclick = var.method()\''.base_url('MemberType/View/'.$data->MemberTypeId).'\'>'.$data->Name.'</a>",'
                .'"'.$data->MemberTypeId.'",'
                .'"'.$data->Name.'"'
            .']';            
            $json .= ',';
        }
        $json = substr($json, 0, strlen($json) - 1);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->membertype->save($this->input->post('membertype'));
    }
    
}