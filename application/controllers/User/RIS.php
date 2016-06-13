<?php

class RIS extends MY_Controller{

	function __construct(){
		parent::__construct('User');
	}

	public function get_ris(){
		$this->load->view($this->layout, ['content' => 'User/content/RIS', 'js' => 'User/js/RIS', 'nav' => 'ris']);
	}
}