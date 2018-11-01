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
            $access = [];
            foreach($this->librarian->getRole($librarian->LibrarianId) as $role){
                $access[] = $role->Name;
            }
            $this->session->set_userdata(
                array(
                    'librarianId' => $librarian->LibrarianId,
                    'username' => $librarian->Username,
                    'isLoggedIn' => true, 
                    'isLibrarian' => true,
                    'access' => $access
                )
            );
        }        
        echo $result;
    }
    
    //i don't why it requires to be the same with the base while the librarian doesn't require it
    //now i know
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
                .'"'.$this->loopAll($this->librarian->getRole($data->LibrarianId)).'",'
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
        if(array_key_exists('LibrarianRoleId', $librarian)){
            if(!v::arrayVal()->notEmpty()->validate($librarian['LibrarianRoleId'])){
                $str .= $this->invalid('LibrarianRoleId', 'Please select at least one role');
                $valid = false;
            }
        }else{
            $str .= $this->invalid('LibrarianRoleId', 'Please select at least one role');
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
        $librarian = $this->librarian->_get($id);
        if($librarian != null){
            echo '{"librarian":';
            echo $this->convert($librarian);
            echo ', "librarianAccess":';
            echo $this->convert($this->librarianAccess->_list($id));            
            echo '}';        
        }else{
            echo '0';
        }
    }

    public function Save(){        
        $librarian = $this->input->post('librarian');
        $librarianId = $this->librarian->save($librarian);
        $this->librarianAccess->save($librarian['LibrarianId'], $librarian['LibrarianRoleId']);
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
            $this->session->set_flashdata("email_sent","Bad!");
        }

    }

}