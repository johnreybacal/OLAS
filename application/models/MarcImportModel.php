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
    
    public function save($ISBN, $Title, $CallNumber, $Author, $Series, $Publisher, $YearPublished, $PlaceOfPublication, $Extent, $Other, $Size){
        if(strpos($Title, "'") != 0){
            $Title = str_replace("'","\'" ,$Title);
        }
        $this->db->query("INSERT into marcimport "
            ."(ISBN, Title, CallNumber, Author, Series, Publisher, YearPublished, PlaceOfPublication, Extent, Other, Size) VALUES ("                
                ."'".$ISBN."', "
                ."'".$Title."', "
                ."'".$CallNumber."', "
                ."'".$Author."', "
                ."'".$Series."', "
                ."'".$Publisher."', "
                ."'".$YearPublished."', "
                ."'".$PlaceOfPublication."', "
                ."'".$Extent."', "
                ."'".$Other."', "
                ."'".$Size."'"
            .")"
        );
    }

    public function delete($id){
        $this->db->query("DELETE FROM marcimport WHERE MarcImportId = '".$id."'");
    }

}