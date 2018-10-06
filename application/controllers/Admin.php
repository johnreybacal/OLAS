<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Admin extends _BaseController {

	public function __construct(){
		parent::__construct();		
	}

	public function index()
	{		          		              	
		$this->header();
        $this->load->view('Admin/index');
		$this->footer();
	}

	
	
}
