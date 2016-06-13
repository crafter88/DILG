<?php

class Items extends MY_Controller{

	function __construct(){
		parent::__construct('Head');
	}

	public function get_items(){
		$this->load->view($this->layout, ['content' => 'Head/content/Items', 'js' => 'Head/js/Items', 'nav' => 'items']);
	}

	public function current_quarter_items(){
		$dept_id = $this->session->userdata('department');
		echo json_encode(['data' => Items_Model::current_quarter_items($dept_id)]);
	}
}