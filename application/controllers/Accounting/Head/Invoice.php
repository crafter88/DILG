<?php

class Invoice extends MY_Controller{

	function __construct(){
		parent::__construct('Accounting');
	}

	public function get_invoice(){
		$this->load->view($this->layout, ['content' => 'Accounting/content/Invoice', 'js' => 'Accounting/js/Invoice', 'nav' => 'invoice']);
	}
}