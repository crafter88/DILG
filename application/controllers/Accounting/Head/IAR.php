<?php

class IAR extends MY_Controller{

	function __construct(){
		parent::__construct('Accounting');
	}

	public function get_iar(){
		$this->load->view($this->layout, ['content' => 'Accounting/content/IAR', 'js' => 'Accounting/js/IAR', 'nav' => 'iar']);
	}

	public function completed_iar(){
		echo json_encode(['data' => Accounting_IAR_Model::completed_iar()]);
	}
}