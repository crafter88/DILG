<?php

class OEJWO extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_oejwo(){
		$this->load->view($this->layout, ['content' => 'GSS/content/OEJWO', 'js' => 'GSS/js/OEJWO', 'nav' => 'oejwo']);
	}
}