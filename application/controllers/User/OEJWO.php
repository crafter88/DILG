<?php

class OEJWO extends MY_Controller{

	function __construct(){
		parent::__construct('User');
	}

	public function get_oejwo(){
		$this->load->view($this->layout, ['content' => 'User/content/OEJWO', 'js' => 'User/js/OEJWO', 'nav' => 'oejwo']);
	}
}