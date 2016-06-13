<?php

class Invoice extends MY_Controller{

	function __construct(){
		parent::__construct('IT');
	}

	public function get_invoice(){
		$this->load->view($this->layout, ['content' => 'IT/content/Invoice', 'js' => 'IT/js/Invoice', 'nav' => 'invoice']);
	}
}