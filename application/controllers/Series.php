<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
class Series extends _BaseController {

    public function __construct(){
		parent::__construct();		
    }
    
    public function index(){		          		              	
		$this->header();
		$this->load->view('Series/index');
		$this->footer();
    }
    
    public function View($id){
        $data['series'] = $this->convert($this->series->_get($id));
        $this->header();
        $this->load->view('Series/View', $data);
        $this->footer();
    }

    public function GenerateTable(){
        $json = '{ "data": [';
        foreach($this->series->_list() as $data){
            $json .= '['
                .'"<a href = \''.base_url('Book/Series/'.$data->SeriesId).'\'>'.$data->Data.'</a>",'
                .'"'.$data->Data.'"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
    public function Save(){        
        $this->book->save($this->input->post('series'));
    }
    
}