<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Librarian extends _BaseController {

    public function __construct(){
		parent::__construct();
    }
    
    public function index(){
        if($this->session->has_userdata('isLoggedIn') && $this->session->has_userdata('isLibrarian')){
            redirect(base_url('Librarian/Dashboard'));
        }else{
            redirect(base_url('Librarian/Login'));
        }
    }   

    public function Login(){        
        if($this->session->has_userdata('isLoggedIn') && $this->session->has_userdata('isLibrarian')){
            redirect(base_url('Librarian/Dashboard'));
        }
        $data['loginPage'] = true;
        $this->header();
        $this->load->view('Librarian/Login', $data);
        $this->footer();		
    }

    public function Manage(){
        $this->librarianView('Librarian/index', '');
    }

    public function Setting(){
        $this->librarianView('Setting/index', '');
    }
    
    public function Dashboard(){
        $data['totalBooks'] = $this->report->totalBooks();
        $data['totalBookCirculations'] = $this->report->totalBookCirculations();
        $data['totalPatrons'] = $this->report->totalPatrons();
        $data['totalOutsideResearchers'] = $this->report->totalOutsideResearchers();
        $this->librarianView('Librarian/Dashboard', $data);
	}
	
	public function Profile($id){
        $data['librarian'] = $this->convert($this->librarian->_get($id));        
        $this->librarianView('Librarian/Profile', $data);        
    }
    
    public function Authenticate(){        
        $result = $this->librarian->authenticate($this->input->post('login')['Username'], $this->input->post('login')['Password']);                    
		if($result != 0){
            $this->UnsetSession();
            $librarian = $this->librarian->_get($result);
            $this->session->set_userdata(
                array(
                    'librarianId' => $librarian->LibrarianId,
                    'username' => $librarian->Username,
                    'isLoggedIn' => true, 
                    'isLibrarian' => true
                )
            );
        }        
        echo $result;
    }
    
    //i don't why it requires to be the same with the base while the librarian doesn't require it
    public function LogOut($page = null){
        parent::LogOut('Librarian/Login');
    }
	
	public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->librarian->_list() as $data){
            $json .= '['
				.'"<a href = \''.base_url('Librarian/View/'.$data->LibrarianId).'\'>'.$data->LibrarianId.'</a>",'
                .'"'.$data->LastName.", ".$data->FirstName.'",'
                .'"'.$data->Username.'",'
                .'"'.$this->librarianrole->_get($data->LibrarianRoleId)->Name.'",'
                .'"<button onclick = \"Librarian_Modal.edit('.$data->LibrarianId.');\" class = \"btn btn-md btn-flat btn-info\"><span class = \"fa fa-edit fa-2x\"></span></button>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Validate(){
        $librarian = $this->input->post('librarian');
        $str = '{';
        $valid = true;
        //role fname lname username password
        //

        //role
        if(!v::intVal()->notEmpty()->validate($librarian['LibrarianRoleId'])){
            $str .= $this->invalid('LibrarianRoleId', 'Please select a role');
            $valid = false;
        }

        //fname
        if (!v::notEmpty()->validate($librarian['FirstName'])){
            $str .= $this->invalid('FirstName', 'First Name is required');
            $valid = false;
        }

        //lname
        if (!v::notEmpty()->validate($librarian['LastName'])){
            $str .= $this->invalid('LastName', 'Last Name is required');
            $valid = false;
        }

        //username
        if (!v::notEmpty()->validate($librarian['Username'])){
            $str .= $this->invalid('Username', 'Username is required');
            $valid = false;
        }
        else{  
            $ifExist = $this->librarian->_exist('Username', $librarian['Username']);  
            if(is_object($ifExist)){
                if($ifExist->LibrarianId != $librarian['LibrarianId']){
                    $str .= $this->invalid('Username', 'Username is already taken');
                    $valid = false;
                }
            }
        }

        //password
        if (!v::notEmpty()->validate($librarian['Password'])){
            $str .= $this->invalid('Password', 'Password is required');
            $valid = false;
        }
        else  if (!v::length(8)->validate($librarian['Password'])){
            $str .= $this->invalid('Password', 'Password must be of minimum 8 characters');
            $valid = false;
        }

        $str .= '"status":"'.($valid ? '1' : '0').'"}';
        echo $str;
        // end
    }

    public function GetAll(){
        echo $this->convert($this->librarian->_list());
    }
    
    public function Get($id){
        echo $this->convert($this->librarian->_get($id));
    }

    public function Save(){        
        $this->librarian->save($this->input->post('librarian'));
    }

    public function Email(){
        $this->load->library('email');

        $this->email->from('johnmarksena@gmail.com', 'Your Name');
        $this->email->to('srphfthnd@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing');

        if($this->email->send()){
           echo "Good";
        }
        else{
            echo "Bad";
        }

    }
    
    public function SMS(){
        $number = "09966367165";
        $message = "Balik mo na yung libro gago.";
        $apicode = "TR-JOHNM367165_YV1W2";
        $ch = curl_init();
        $itexmo = array(
            '1' => $number,
            '2' => $message,
            '3' => $apicode
        );
        curl_setopt($ch, CURLOPT_URL, "https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        return curl_exec ($ch);
                curl_close ($ch);
    }

}