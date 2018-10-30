<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');

class OLAS extends _BaseController {


	public function __construct(){
		parent::__construct();		
	}

	public function index()
	{		          		
		foreach($this->bookCatalogue->_list() as $b){						
			$data['books'][] = array(
				$b,
				'book' => $this->book->_get($b->ISBN),
				'author' => $this->book->getAuthor($b->ISBN),
				'genre' => $this->book->getGenre($b->ISBN),
				'subject' => $this->book->getSubject($b->ISBN)
			);
		}
		$data['authors'] = $this->author->_list();
		$this->header();
		$this->load->view('OLAS/index', $data);
		$this->footer();		
	}

	public function About(){
		$this->header();
		$this->load->view('OLAS/About');
		$this->footer();
	}

	public function Developers(){
		$this->header();
		$this->load->view('OLAS/Developers');
		$this->footer();
	}
	
	
}
