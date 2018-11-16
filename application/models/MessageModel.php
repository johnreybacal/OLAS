<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"message",
				"MessageId",
			)
		);
    }

    public function save($message){
        $this->db->query("INSERT into message "
            ."(PatronId, Title, Message, DateTime) VALUES ("                   
                ."'".$message['PatronId']."',"
                ."'".$message['Title']."',"
                ."'".$message['Message']."',"
                ."CURRENT_TIMESTAMP"
            .")"
        );		
	}	


}

?>
