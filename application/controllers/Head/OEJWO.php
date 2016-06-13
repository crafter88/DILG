<?php

class OEJWO extends MY_Controller{

	function __construct(){
		parent::__construct('HEAD');
	}

	public function get_oejwo(){
		$this->load->view($this->layout, ['content' => 'HEAD/content/oejwo', 'js' => 'HEAD/js/oejwo', 'nav' => 'oejwo']);
	}
}