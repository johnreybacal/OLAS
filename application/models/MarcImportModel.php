<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcImportModel extends _BaseModel{

    public function __construct(){		
		parent::_setDai(
			array(
				"marcimport",
				"MarcImportId",
			)
		);
    }
    
    public function save($isbn, $title){
        if(strpos($title, "'") != 0){
            $title = str_replace("'","\'" ,$title);
        }
        $this->db->query("INSERT into marcimport "
            ."(ISBN, Title) VALUES ("                   
                ."'".$isbn."', "                
                ."'".$title."'"                
            .")"
        );
    }

    public function delete($id){
        $this->db->query("DELETE FROM marcimport WHERE MarcImportId = '".$id."'");
    }

}