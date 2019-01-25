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

    public function Add(){
        $this->librarianView('Patron/Add', '');
    }
    
    public function Edit($id){
        $data['patron'] = $this->patron->_get($id);
        $this->librarianView('Patron/Edit', $data);
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
        $this->cart->destroy();
        parent::LogOut('');
    }
	
    public function Validate(){
        $patron = $this->input->post('patron');
        $str = '{';
        $valid = true;
        // fname mname lname email contact email idnumber rfidno pass
        // 
        //patron type
        if(!v::intVal()->notEmpty()->validate($patron['PatronTypeId'])){
            $str .= $this->invalid('PatronTypeId', 'Please select patron type');
            $valid = false;
        }

        //fname
        if (!v::notEmpty()->validate($patron['FirstName'])){
            $str .= $this->invalid('FirstName', 'First Name is required');
            $valid = false;
        }

        //lname
        if (!v::notEmpty()->validate($patron['LastName'])){
            $str .= $this->invalid('LastName', 'Last Name is required');
            $valid = false;
        }

        //email
        if (!v::notEmpty()->validate($patron['Email'])){
            $str .= $this->invalid('Email', 'Email is required');
            $valid = false;
        }
        else{
            if (!v::filterVar(FILTER_VALIDATE_EMAIL)->validate($patron['Email'])){
            $str .= $this->invalid('Email', 'Invalid email address');
            $valid = false;
            }
        }

        //id no
        if (!v::notEmpty()->validate($patron['IdNumber'])){
            $str .= $this->invalid('IdNumber', 'ID Number is required');
            $valid = false;
        }
        // else  if (!v::digit()->validate($patron['IdNumber'])){
        //     $str .= $this->invalid('IdNumber', 'Invalid ID number');
        //     $valid = false;
        // }
        else  if (!v::length(10)->validate($patron['IdNumber'])){
            $str .= $this->invalid('IdNumber', 'Not an ID number');
            $valid = false;
            //pag 11 error, pag 10 di nag-error kapag length < 15-037-000
        }

        //contact no
        if (!v::notEmpty()->validate($patron['ContactNumber'])){
            $str .= $this->invalid('ContactNumber', 'Contact Number is required');
            $valid = false;
        }
        // else  if (!v::digit()->validate($patron['ContactNumber'])){
        //     $str .= $this->invalid('ContactNumber', 'Invalid contact number');
        //     $valid = false;
        // }
        else{  
            $ifExist = $this->patron->_exist('ContactNumber', $patron['ContactNumber']);  
            if(is_object($ifExist)){
                if($ifExist->PatronId != $patron['PatronId']){
                    $str .= $this->invalid('ContactNumber', 'Number is already taken');
                    $valid = false;
                }
            }
            if (!v::phone()->validate($patron['ContactNumber'])){
            $str .= $this->invalid('ContactNumber', 'Not a phone number');
            $valid = false;
            //valid only when input is 7 9 11
            }
        }         
                  
        //rfid no
        if (!v::notEmpty()->validate($patron['RFIDNo'])){
            $str .= $this->invalid('RFIDNo', 'RFID Number is required');
            $valid = false;
        }
        else{  
            $ifExist = $this->patron->_exist('RFIDNo', $patron['RFIDNo']);  
            if(is_object($ifExist)){
                if($ifExist->PatronId != $patron['PatronId']){
                    $str .= $this->invalid('RFIDNo', 'RFID is already taken');
                    $valid = false;
                }
            }
        }        
        // else  if (!v::digit()->validate($patron['RFIDNo'])){
        //     $str .= $this->invalid('RFIDNo', 'Invalid rfid number');
        //     $valid = false;
        // }

        //password
        if (!v::notEmpty()->validate($patron['Password'])){
            $str .= $this->invalid('Password', 'Password is required');
            $valid = false;
        }
        else  if (!v::length(8)->validate($patron['Password'])){
            $str .= $this->invalid('Password', 'Password must be of minimum 8 characters');
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
                .'"'.$data->LastName.", ".$data->FirstName.'",'
                .'"'.$this->patronType->_get($data->PatronTypeId)->Name.'",'
                .'"'.$data->ContactNumber.'",'
                .'"'.$data->Email.'",'
                // .'"<button onclick = \"Patron_Modal.edit('.$data->PatronId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
                // .'"<a href = \"'.base_url("Patron/edit/".$data->PatronId).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
                .'"<a href = \"'.base_url("Patron/Edit/".$data->PatronId).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-eye fa-2x\"></span></a><a href = \"'.base_url("Patron/Edit/".$data->PatronId).'\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
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

    public function GetAll(){
        echo $this->convert($this->patron->_list());
    }

    public function Save(){        
        $this->patron->save($this->input->post('patron'));
    }
}