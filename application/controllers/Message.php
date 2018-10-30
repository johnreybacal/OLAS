<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Message extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }

    public function Get(){
        echo $this->convert($this->message->_list("WHERE PatronId = '".$this->session->userdata('patronId')."' ORDER BY MessageId DESC"));
    }    

}
