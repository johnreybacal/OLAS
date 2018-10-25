<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookStatusModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"bookstatus",
				"BookStatusId",
			)
		);
	}

}