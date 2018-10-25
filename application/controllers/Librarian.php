<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Librarian extends _BaseController {

    public function __construct(){
		parent::__construct();
    }
    
    public function index(){		          		              	
        $this->Login();		
    }   

    public function Login(){        
        if($this->session->has_userdata('isLoggedIn')){
            redirect(base_url('Librarian/Dashboard'));
        }
        $this->header();
        $this->load->view('Librarian/Login');
		$this->footer();
    }
    
    public function Dashboard(){
        $this->librarianView('Librarian/Dashboard', '');
	}
	
	public function Profile($id){
        $data['librarian'] = $this->convert($this->librarian->_get($id));
        $this->header();
        $this->load->view('Librarian/View', $data);
        $this->footer();
    }
    
    public function Authenticate(){        
        $result = $this->librarian->authenticate($this->input->post('login')['Username'], $this->input->post('login')['Password']);                    
		if($result != 0){
            $librarian = $this->librarian->_get($result);
            $this->session->set_userdata(
                array(
                    'name' => $librarian->Name,
                    'isLoggedIn' => true, 
                    'isLibrarian' => true
                )
            );
        }        
        echo $result;        
    }
    
    public function LogOut(){
        $this->session->unset_userdata(array('name', 'isLoggedIn', 'isLibrarian'));
        redirect(base_url('Librarian/Login'));
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