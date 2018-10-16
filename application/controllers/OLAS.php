<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');

class OLAS extends _BaseController {


	public function __construct(){
		parent::__construct();		
	}

	public function index()
	{		          
		$data['book'] = $this->convert($this->bookCatalogue->_list());
		$this->header();
		$this->load->view('OLAS/index', $data);
		$this->footer();		
	}

	public function Login(){
		$this->header();
		$this->load->view('OLAS/Login');
		$this->footer();
	}	
	
}
