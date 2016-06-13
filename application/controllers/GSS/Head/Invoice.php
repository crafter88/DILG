<?php

class Invoice extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_invoice(){
		$this->load->view($this->layout, ['content' => 'GSS/content/Invoice', 'js' => 'GSS/js/Invoice', 'nav' => 'invoice']);
	}
}