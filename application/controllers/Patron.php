<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Patron extends _BaseController {

    public function __construct(){
		parent::__construct();
    }
    
    public function index(){		          		              	
		$this->librarianView('Patron/index', '');
    }
    
    public function Authenticate(){        
		print_r($this->patron->authenticate(
            $this->input->post('login')['Username'],
            $this->input->post('login')['Password']
        ));
	}
	
	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->patron->_list() as $data){
            $json .= '['
				.'"<a href = \''.base_url('Patron/View/'.$data->PatronId).'\'>'.$data->PatronId.'</a>",'
                .'"'.$data->LastName.", ".$data->FirstName.'",'
                .'"'.$this->patrontype->_get($data->PatronTypeId)->Name.'",'
                .'"'.$data->ContactNumber.'",'
                .'"'.$data->Email.'",'
                .'"<button onclick = \"Patron_Modal.edit('.$data->PatronId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
                // .'"<a href = \"'.base_url("Patron/edit/".$data->PatronId).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Get($id){
        echo $this->convert($this->patron->_get($id));
    }

    public function Save(){        
        $this->patron->save($this->input->post('patron'));
    }
}