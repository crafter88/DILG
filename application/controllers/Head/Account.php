<?php

class Account extends MY_Controller{

	function __construct(){
		parent::__construct('Head');
	}

	public function get_account(){
		$this->load->view($this->layout, ['content' => 'Head/content/Account', 'js' => 'Head/js/Account', 'nav' => 'account']);
	}
}