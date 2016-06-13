<?php

class OEJWO extends MY_Controller{

	function __construct(){
		parent::__construct('IT');
	}

	public function get_oejwo(){
		$this->load->view($this->layout, ['content' => 'IT/content/oejwo', 'js' => 'IT/js/oejwo', 'nav' => 'oejwo']);
	}
}