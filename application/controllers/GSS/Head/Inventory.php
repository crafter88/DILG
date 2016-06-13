<?php

class Inventory extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_inventory(){
		$this->load->view($this->layout, ['content' => 'GSS/content/Inventory', 'js' => 'GSS/js/Inventory', 'nav' => 'inventory']);
	}

	public function inventory_record(){
		echo json_encode(['data' => GSS_Inventory_Model::inventory_record()]);
	}

	public function gss_ppmp(){
		echo json_encode(['data' => GSS_Inventory_Model::gss_ppmp()]);
	}

	public function accounting_ppmp(){
		echo json_encode(['data' => GSS_Inventory_Model::accounting_ppmp()]);
	}

	public function it_ppmp(){
		echo json_encode(['data' => GSS_Inventory_Model::it_ppmp()]);
	}

	public function asset_inventory(){
		echo json_encode(['data' => GSS_Inventory_Model::asset_inventory()]);
	}

	public function add_parts(){
		$asset_no = $this->input->post('asset_no');
		$asset_name = $this->input->post('asset_name');
		$asset_desc = $this->input->post('asset_desc');
		$asset_part_no = $this->input->post('part_no');
		$part = $this->input->post('parts');
		$part_desc = $this->input->post('desc');

		$asset_part = [];
		if(count($part) > 0){
			foreach($part as $key => $value){
				array_push($asset_part, ['asset_part_no' => $asset_part_no[$key], 'asset_part_name' => $part[$key], 'asset_part_description' => $part_desc[$key], 'asset_no' => $asset_no]);
			}
		}

		$asset = ['asset_no' => $asset_no, 'asset_name' => $asset_name, 'asset_description' => $asset_desc];
		
		GSS_Inventory_Model::add_parts($asset, $asset_part);
		return redirect('gss/head/inventory');
	}

}