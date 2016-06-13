<?php

class PO extends MY_Controller{

	function __construct(){
		parent::__construct('Accounting');
	}

	public function get_po(){
		$this->checkIfLoggedIn(2,'head');
		$this->load->view($this->layout, ['content' => 'Accounting/content/PO', 'js' => 'Accounting/js/PO', 'nav' => 'po']);
	}

	public function all_po(){
		$this->checkIfLoggedIn(2,'head');
		echo json_encode(['data' => Accounting_PO_Model::all_po()]);
	}
	public function completed_po(){
		$this->checkIfLoggedIn(2,'head');
		echo json_encode(['data' => Accounting_PO_Model::completed_po()]);
	}
	public function pending_po(){
		$this->checkIfLoggedIn(2,'head');
		echo json_encode(['data' => Accounting_PO_Model::pending_po()]);
	}
	public function confirmed_po(){
		$this->checkIfLoggedIn(2,'head');
		echo json_encode(['data' => Accounting_PO_Model::confirmed_po()]);
	}
	public function rejected_po(){
		$this->checkIfLoggedIn(2,'head');
		echo json_encode(['data' => Accounting_PO_Model::rejected_po()]);
	}

	public function post_confirm_po(){
		$this->checkIfLoggedIn(2,'head');
		$id = $this->input->post('id');
		Accounting_PO_Model::post_confirm_po($id);
	}
	public function post_reject_po(){
		$this->checkIfLoggedIn(2,'head');
		$id = $this->input->post('id');
		Accounting_PO_Model::post_reject_po($id);
	}
}