<?php

class RIS extends MY_Controller{

	function __construct(){
		parent::__construct('IT');
	}

	public function get_ris(){
		$this->load->view($this->layout, ['content' => 'IT/content/RIS', 'js' => 'IT/js/RIS', 'nav' => 'ris']);
	}
}