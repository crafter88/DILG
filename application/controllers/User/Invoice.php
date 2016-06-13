<?php

class Invoice extends MY_Controller{

	function __construct(){
		parent::__construct('User');
	}

	public function get_invoice(){
		$this->load->view($this->layout, ['content' => 'User/content/Invoice', 'js' => 'User/js/Invoice', 'nav' => 'invoice']);
	}
}