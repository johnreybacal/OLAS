<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
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
    
    //i don't why it requires to be the same with the base while the Patron doesn't require it
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

    public function GetAll(){
        echo $this->convert($this->librarian->_list());
    }
    
    public function Get($id){
        echo $this->convert($this->librarian->_get($id));
    }

    public function Save(){        
        $this->librarian->save($this->input->post('librarian'));
    }

}