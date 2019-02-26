<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Loan extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('IssuedBooks/index');
		$this->footer();
    }
    
    // public function View($id){
    //     $data['loan'] = $this->loan->convert($this->loan->_get($id));
    //     $this->header();
    //     $this->load->view('Loan/View', $data);
    //     $this->footer();
    // }
    
    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->loan->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/IssuedBooks/'.$data->LoanId).'\'>'.$data->LoanId.'</a>",'
                .'"'.$data->MemberId.'",'
                .'"'.$this->formatAccessionNumber($data->AccessionNumber).'",'
                .'"'.$data->DateBorrowed.'",'
                .'"'.$data->DateDue.'",'
                .'"'.$data->DateReturned.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('loan'));
    }
    
}