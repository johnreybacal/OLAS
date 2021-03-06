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
    
    public function Clearance(){
        $this->librarianView('Patron/Clearance', '');
    }
    
    public function Edit($id){
        $data['patron'] = $this->patron->_get($id);
        $data['course'] = $this->studentCourse->_get($id);
        $this->librarianView('Patron/Edit', $data);
    }

    public function View($id){
        $data['patron'] = $this->patron->_get($id);
        $this->librarianView('Patron/View', $data);
    }

    public function Admission(){
        $this->librarianView('Patron/Admission', '');
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
        
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->patron->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Patron/View/'.$data->PatronId).'\'>'.$data->LastName.", ".$data->FirstName.'</a>",'                
                .'"'.$this->patronType->_get($data->PatronTypeId)->Name.'",'
                .'"'.$data->ContactNumber.'",'
                .'"'.$data->Email.'",'                
                .'"'.$this->penalty->patronClearance($data->PatronId).'",'                
                .'"<a href = \"'.base_url("Patron/Edit/".$data->PatronId).'\" class = \"btn btn-md btn-flat btn-info\" title=\"Edit\"><span class = \"fa fa-edit fa-2x\"></span></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function GenerateTableClearance(){
        $json = '{ "data": [';
        foreach($this->penalty->_list("WHERE Status = '0'") as $data){
            $patron = $this->patron->_get($data->PatronId);
            $loan = $this->loan->_get($data->LoanId);
            $book = $this->book->_get(
                $this->bookCatalogue->_get(
                    $loan->AccessionNumber
                )->ISBN
            );
            $json .= '['
                .'"'.$patron->LastName.", ".$patron->FirstName.' ",'     
                .'"'.$book->Title.'",'
                .'"'.$loan->AmountPayed.'",'
                .'"<button onclick = \"Clearance.clear('.$data->PenaltyId.')\" class = \"btn btn-md btn-flat btn-success\" title=\"Clear\"><span class = \"fa fa-check fa-2x\"></span></a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function GenerateStudentAdmission($college = null){
        $additionalQuery = '';
        if($college != null){
            $additionalQuery = "WHERE PatronId IN (SELECT PatronId FROM studentcourse WHERE CourseId IN (SELECT CourseId FROM course WHERE CollegeId = '".$college."'))";
        }
        $json = '{ "data": [';
        foreach($this->admission->_list($additionalQuery) as $data){
            $patron = $this->patron->_get($data->PatronId);
            $course = $this->course->_get($this->studentCourse->_get($data->PatronId));
            $college = $this->college->_get($course->CollegeId);
            $json .= '['
                .'"'.$data->DateTime.'",'
                .'"<a href = \''.base_url('Patron/View/'.$patron->PatronId).'\'>'.$patron->IdNumber.'</a>",'
                .'"'.$patron->LastName.", ".$patron->FirstName.'",'                
                .'"'.$course->Name.'",'
                .'"'.$college->Name.'"'                
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
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
        }else{
            if($patron['PatronTypeId'] == 1 && !v::intVal()->notEmpty()->validate($patron['CourseId'])){
                $str .= $this->invalid('CourseId', 'Please select student course');
                $valid = false;
            }
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

    public function Get($id){
        echo $this->convert($this->patron->_get($id));
    }

    public function GetAll(){
        echo $this->convert($this->patron->_list());
    }

    public function Save(){        
        $patron = $this->input->post('patron');
        $this->patron->save($patron);
        if($patron['PatronTypeId'] == 1){
            $this->studentCourse->save($patron['PatronId'], $patron['CourseId']);
        }
    }

    public function Clear($penaltyId){
        $this->penalty->clear($penaltyId);
    }

    public function StudentAdmit($IdNumber){
        $student = $this->studentCourse->studentExist($IdNumber);
        if(is_object($student)){            
            $this->admission->save($student->PatronId);
            echo "1";
        }else{
            echo "0";
        }
    }
}