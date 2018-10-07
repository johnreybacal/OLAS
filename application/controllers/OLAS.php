<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');

class OLAS extends _BaseController {


	public function __construct(){
		parent::__construct();		
	}

	public function index()
	{		          		              	
		// $this->header();
		// $this->load->view('OLAS/index');
		// $this->footer();
		redirect(base_url('Librarian/Dashboard'));
	}

	public function Login(){
		$this->header();
		$this->load->view('OLAS/Login');
		$this->footer();
	}	
	
}
