<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Librarian extends _BaseController {

    public function __construct(){
		parent::__construct();
    }
    
    // public function index(){		          		              	
<<<<<<< HEAD
        //$this->Login();		
    // }

    public function index(){		          		              	
		$this->header();
		$this->load->view('Librarian/index');
		$this->footer();
    }

    public function Add(){		          		              	
		$this->header();
		$this->load->view('Librarian/Add');
		$this->footer();
    }

    public function Login(){        
        if($this->session->has_userdata('isLoggedIn')){
            redirect(base_url('Librarian/Dashboard'));
        }
        $this->header();
        $this->load->view('Librarian/Login');
		$this->footer();
    }
    
    // public function Dashboard(){
    //     if($this->isLibrarian()){
    //         $this->header();
    //         $this->load->view('Librarian/Dashboard');
    //         $this->footer();            
    //     }
	// }
	
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
                .'"'.$data->LibrarianRoleId.'",'
                .'"'.$data->FirstName.'",'
                .'"'.$data->LastName.'",'
                .'"'.$data->Username.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function Save(){        
        $this->librarian->save($this->input->post('librarian'));
    }

}