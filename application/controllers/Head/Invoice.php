<?php

class Invoice extends MY_Controller{

	function __construct(){
		parent::__construct('Head');
	}

	public function get_invoice(){
		$this->load->view($this->layout, ['content' => 'Head/content/Invoice', 'js' => 'Head/js/Invoice', 'nav' => 'invoice']);
	}
}