<?php

class OEJWO extends MY_Controller{

	function __construct(){
		parent::__construct('Accounting');
	}

	public function get_oejwo(){
		$this->load->view($this->layout, ['content' => 'Accounting/content/Oejwo', 'js' => 'Accounting/js/Oejwo', 'nav' => 'oejwo']);
	}
}