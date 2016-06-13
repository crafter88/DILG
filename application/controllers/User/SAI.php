<?php

class SAI extends MY_Controller{

	function __construct(){
		parent::__construct('User');
	}

	public function get_sai(){
		$this->load->view($this->layout, ['content' => 'User/content/SAI', 'js' => 'User/js/SAI', 'nav' => 'sai']);
	}

	public function all_sai(){
		$user_id = $this->session->userdata('user_id');
		$department = $this->session->userdata('department');

		echo json_encode(['data' => SAI_Model::all_sai(['user_id' => $user_id, 'dept_id' => $department])]);
	}

	public function ppmp_items(){
		$dept_id = $this->session->userdata('department');
		echo json_encode(SAI_Model::ppmp_items($dept_id));
	}

	public function last_sai(){
		echo json_encode(SAI_Model::last_sai());
	}

	public function save_sai(){
		$items_id = $this->input->post('items_id');
		$inventory_id = $this->input->post('inventory_id');
		$requested_qty = $this->input->post('requested_qty');
		$index = $this->input->post('index');

		$sai_no = $this->input->post('sai_no');
		$date_created = $this->input->post('date_created');
		$user_id = $this->session->userdata('user_id');
		$department = $this->session->userdata('department');

		SAI_Model::save_sai($sai_no, $date_created, $user_id, $department, $items_id, $inventory_id, $index, $requested_qty);	
		return redirect('user/sai');
	}
}