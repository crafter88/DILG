<?php

class RIS extends MY_Controller{

	function __construct(){
		parent::__construct('Head');
	}

	public function get_sai(){
		$this->checkIfLoggedIn(4,'head');
		$this->load->view($this->layout, ['content' => 'Head/content/RIS', 'js' => 'Head/js/RIS', 'nav' => 'ris']);
	}
	
	public function pending_sai(){
		echo json_encode(['data' => SAI_Model::pending_sai()]);
	}
	
	public function cancelled_sai(){
		echo json_encode(['data' => SAI_Model::cancelled_sai()]);
	}
	
	public function rejected_sai(){
		echo json_encode(['data' => SAI_Model::rejected_sai()]);
	}
	
	public function confirmed_sai(){
		echo json_encode(['data' => SAI_Model::confirmed_sai()]);
	}
	
	public function draft_sai(){
		echo json_encode(['data' => SAI_Model::draft_sai()]);
	}
	
	public function post_cancel_sai(){
		if ($this->session->userdata('user_id')){
			$id = $this->input->post('id');
			SAI_Model::post_cancel_sai($id);
		}else{
			$this->session->set_flashdata('error', 'You are not Logged In.');
			redirect('/');
		}
	}
	
	public function last_sai(){
		echo json_encode(SAI_Model::last_sai());
	}
	
	public function save_sai(){
		$user_id = $this->session->userdata('user_id');
		$dept = $this->session->userdata('department');
		$sai_no = $this->input->post('sai_no');
		$sai_no = substr($sai_no, 8);
		$sai_status = $this->input->post('sai_status');
		$sai_date_created = $this->input->post('sai_date_created');
		$sai = ['sai_no' => $sai_no, 'status' => $sai_status, 'date_created' => $sai_date_created, 'user_id' => $user_id, 'dept_id' => $dept];

		$inventory_item = $this->input->post('inventory_item');
		$inventory_desc = $this->input->post('inventory_desc');
		$inventory_qty = $this->input->post('inventory_qty');
		$inventory_unit_cost = $this->input->post('inventory_unit_cost');
		$inventory_total_cost = $this->input->post('inventory_total_cost');
		$inventory_type = $this->input->post('inventory_type');
		$inventory_id = $this->input->post('inventory_id');
		
		$inventory_items = [];
		if(count($inventory_item) > 0){
			foreach($inventory_item as $key => $value){
				array_push($inventory_items, ['name' => $value, 'description' => $inventory_desc[$key], 'qty' => $inventory_qty[$key], 'unit_cost' => $inventory_unit_cost[$key], 'total_cost' => $inventory_total_cost[$key], 'item_type' => $inventory_type[$key], 'inventory_id' => $inventory_id[$key], 'type' => 'sai', 'source' => 'inventory']);
			}
		}
		SAI_Model::save_sai($sai,$inventory_items);
		return redirect('head/ris');
	}
	
	public function inventory(){
		echo json_encode(SAI_Model::ppmp_items($this->session->userdata('department')));
	}
}