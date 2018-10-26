<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Patron extends _BaseController {

    public function __construct(){
		parent::__construct();
    }
    
    public function index(){		          		              	
		$this->librarianView('Patron/index', '');
    }
    
    public function Authenticate(){        
        $result = $this->patron->authenticate($this->input->post('login')['IdNumber'], $this->input->post('login')['Password']);                    
		if($result != 0){
            $this->UnsetSession();
            $patron = $this->patron->_get($result);
            $this->session->set_userdata(
                array(
                    'patronId' => $patron->PatronId,
                    'name' => $patron->FirstName,
                    'isLoggedIn' => true, 
                    'isPatron' => true
                )
            );
        }        
        echo $result;
    }
    
    public function LogOut($page = null){//required pala talaga lol
        parent::LogOut('');
    }
	
    public function Validate(){
        $patron = $this->input->post('patron');
        $str = '{';
        $valid = true;
        // fname mname lname email contact email idnumber rfidno pass
        // 
        if (!v::notEmpty()->validate($patron['FirstName'])){
            $str .= $this->invalid('FirstName', 'First Name is required');
            $valid = false;
        }
        if (!v::notEmpty()->validate($patron['LastName'])){
            $str .= $this->invalid('LastName', 'Last Name is required');
            $valid = false;
        }
        if (!v::filterVar(FILTER_VALIDATE_EMAIL)->validate($patron['Email'])){
            $str .= $this->invalid('Email', 'Email is required');
            $valid = false;
        }
        if (!v::notEmpty()->validate($patron['IdNumber'])){
            $str .= $this->invalid('IdNumber', 'ID Number is required');
            $valid = false;
        }
        if (!v::notEmpty()->validate($patron['ContactNumber'])){
            $str .= $this->invalid('ContactNumber', 'Contact Number is required');
            $valid = false;
        }
        if (!v::notEmpty()->validate($patron['RFIDNo'])){
            $str .= $this->invalid('RFIDNo', 'RFID Number is required');
            $valid = false;
        }
        if (!v::notEmpty()->validate($patron['Password'])){
            $str .= $this->invalid('Password', 'Password is required');
            $valid = false;
        }
        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
        //
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