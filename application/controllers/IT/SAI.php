<?php

class SAI extends MY_Controller{

	function __construct(){
		parent::__construct('IT');
	}

	public function get_sai(){
		$this->load->view($this->layout, ['content' => 'IT/content/SAI', 'js' => 'IT/js/SAI', 'nav' => 'sai']);
	}
}