<?php

class IAR extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_iar(){
		$this->load->view($this->layout, ['content' => 'GSS/content/IAR', 'js' => 'GSS/js/IAR', 'nav' => 'iar']);
	}

	public function completed_iar(){
		echo json_encode(['data' => GSS_IAR_Model::completed_iar()]);
	}
	
	public function all_iar(){
		echo json_encode(['data' => GSS_IAR_Model::all_iar()]);
	}
	
	public function incomplete_iar(){
		echo json_encode(['data' => GSS_IAR_Model::incomplete_iar()]);
	}

	public function draft_iar(){
		echo json_encode(['data' => GSS_IAR_Model::draft_iar()]);
	}

	public function all_po(){
		echo json_encode(GSS_IAR_Model::all_po());
	}

	public function inventory(){
		echo json_encode(GSS_IAR_Model::inventory());
	}
	
	public function last_iar(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(GSS_IAR_Model::last_iar());
	}
	
	public function iar_exist(){
		$id = $_POST['data'];
		echo GSS_IAR_Model::iar_exist($id);
	}

	public function save_iar(){
		$iar_status = $this->input->post('iar_status');
		$iar_no = $this->input->post('iar_no');
		$iar_date_created = $this->input->post('iar_date_created2');
		$po_id = $this->input->post('po_id');
		$post_inventory_item = $this->input->post('item_name');
		$post_inventory_desc = $this->input->post('item_description');
		$post_item_type = $this->input->post('item_type');
		$post_inventory_qty = $this->input->post('item_dqty');
		$post_inventory_unit_cost = $this->input->post('item_unit_cost');
		$post_inventory_total_cost = $this->input->post('item_total');

		$inventory_items = [];
		if(count($post_inventory_item) > 0){
			foreach ($post_inventory_item as $key => $value) {
				array_push($inventory_items, ['name' => $value, 'description' => $post_inventory_desc[$key], 'qty' => $post_inventory_qty[$key], 'unit_cost' => str_replace(',', '', $post_inventory_unit_cost[$key]), 'total_cost' => str_replace(',', '', $post_inventory_total_cost[$key]), 'item_type' => $post_item_type[$key]]);
				if($post_inventory_qty[$key] != (str_replace(',', '', $post_inventory_total_cost[$key])/str_replace(',', '', $post_inventory_unit_cost[$key]))){
					if($iar_status != "draft"){
						$iar_status="incomplete";
					}
				}
			}
		}

		GSS_IAR_Model::save_iar($po_id, $inventory_items, $iar_date_created, $iar_status,$iar_no);

		return redirect('gss/head/iar');
	}

	public function edit_iar(){
		$iar_id = $this->input->post('iar_id');
		$iar_status = $this->input->post('iar_status');
		$iar_date_created = $this->input->post('iar_date_created');
		$po_id = $this->input->post('po_id');

		$current_iar_id = $this->input->post('current_iar_id');
		$current_iar_item = $this->input->post('current_iar_item');
		$current_iar_desc = $this->input->post('current_iar_desc');
		$current_iar_type = $this->input->post('current_iar_type');
		$current_iar_qty = $this->input->post('current_iar_qty');
		$current_iar_unit_cost = $this->input->post('current_iar_unit_cost');
		$current_iar_total_cost = $this->input->post('current_iar_total_cost');
		$current_iar_source = $this->input->post('current_iar_source');
		$current_iar_inventory_id = $this->input->post('current_iar_inventory_id');
		$current_iar_form_id = $this->input->post('current_iar_form_id');


		$inventory_id = $this->input->post('inventory_id');
		$inventory_item = $this->input->post('inventory_item');
		$inventory_desc = $this->input->post('inventory_desc');
		$inventory_type = $this->input->post('inventory_type');
		$inventory_qty = $this->input->post('inventory_qty');
		$inventory_unit_cost = $this->input->post('inventory_unit_cost');
		$inventory_total_cost = $this->input->post('inventory_total_cost');


		$current_iar_items = [];
		foreach ($current_iar_id as $key => $value) {
			array_push($current_iar_items, ['id' => $value, 'name' => $current_iar_item[$key], 'description' => $current_iar_desc[$key], 'qty' => $current_iar_qty[$key], 'unit_cost' => $current_iar_unit_cost[$key], 'total_cost' => $current_iar_total_cost[$key], 'type' => $current_iar_type[$key], 'source' => $current_iar_source[$key], 'inventory_id' => $current_iar_inventory_id[$key], 'form_id' => $current_iar_form_id[$key]]);
		}

		$current_inventory_items = [];
		foreach ($inventory_item as $key => $value) {
			array_push($current_inventory_items, ['name' => $value, 'description' => $inventory_desc[$key], 'qty' => $inventory_qty[$key], 'unit_cost' => $inventory_unit_cost[$key], 'total_cost' => $inventory_total_cost[$key], 'type' => 'iar', 'source' => 'inventory', 'inventory_id' => $inventory_id, 'item_type' => $inventory_type[$key], 'form_id' => $iar_id]);
		}

		GSS_IAR_Model::edit_iar($iar_id, $po_id, $iar_status, $iar_date_created, $current_iar_items, $current_inventory_items);

		return redirect('gss/head/iar');
	}
}