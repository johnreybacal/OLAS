<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublisherModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"publisher",
				"PublisherId",
			)
		);
	}

	public function save($publisher){
		if($publisher['PublisherId'] == 0){//insert			
			$this->db->query("INSERT into publisher "
				."(Data) VALUES ("                   
					."'".$publisher['Data']."'"
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE publisher SET "
                ."Data = '".$publisher['Data']."'"
                ."WHERE PublisherId = '".$publisher['PublisherId']."'"
			);			
		}
    }	
    
}