<?php

class PO extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_po(){
		$this->checkIfLoggedIn(1,'head');
		$this->load->view($this->layout, ['content' => 'GSS/content/PO', 'js' => 'GSS/js/PO', 'nav' => 'po']);
	}

	public function last_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(GSS_PO_Model::last_po());
	}
	public function all_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(['data' => GSS_PO_Model::all_po()]);
	}
	public function pending_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(['data' => GSS_PO_Model::pending_po()]);
	}
	public function completed_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(['data' => GSS_PO_Model::completed_po()]);
	}
	public function confirmed_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(['data' => GSS_PO_Model::confirmed_po()]);
	}
	public function rejected_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(['data' => GSS_PO_Model::rejected_po()]);
	}
	public function draft_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(['data' => GSS_PO_Model::draft_po()]);
	}
	public function cancelled_po(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(['data' => GSS_PO_Model::cancelled_po()]);
	}
	public function read_csv(){
		$this->checkIfLoggedIn(1,'head');
		$data = [];

	 	if($_FILES["file"]["size"] > 0){
		 	$filename=$_FILES["file"]["tmp_name"];
		  	$file = fopen($filename, "r");
     	 	
     	 	while (($emapData = fgetcsv($file, 10000, "\r")) !== FALSE){
	    		foreach ($emapData as $key => $value) {
	    			$item = explode(';', $value);
	    			array_push($data, ['name' => $item[0], 'description' => $item[1], 'qty' => $item[2], 'unit_cost' => $item[3], 'total_cost' => $item[4]]);
	    		}
	          
	        }
	        fclose($file);
		 }

		 echo json_encode($data);
	}
	public function inventory(){
		$this->checkIfLoggedIn(1,'head');
		echo json_encode(GSS_PO_Model::inventory());
	}
	public function save_po(){
		$this->checkIfLoggedIn(1,'head');
		$po_no = $this->input->post('po_no');
		$po_status = $this->input->post('po_status');
		$po_supplier = $this->input->post('po_supplier');
		$po_purpose = $this->input->post('po_purpose');
		$po_source = $this->input->post('po_source');
		$po_files = $this->input->post('total_files');
		$po_date_created = $this->input->post('po_date_created2');
		$po = ['po_no' => $po_no, 'status' => $po_status, 'source' => $po_source, 'purpose' => $po_purpose, 'supplier' => $po_supplier, 'date_created' => $po_date_created, 'user_id' => $this->session->userdata('user_id')];
		
		$uploaded_po = [];
		
		if(count($po_files) > 0){
			for($i=0; $i<$po_files; $i++){
				array_push($uploaded_po, ['filename' => $this->input->post('file_name_'.$i), 'items' => []]);
			}
			foreach($uploaded_po as $key_1 => $value_1){
				foreach($this->input->post('upload_item_'.$key_1) as $key_2 => $value_2){
					array_push($uploaded_po[$key_1]['items'], [
														'name' 			=> $value_2,
														'form_type' 	=> 'po',
														'source' 		=> 'csv',
														'filename' 		=> $uploaded_po[$key_1]['filename'][0],
														'description' 	=> $this->input->post('upload_desc_'.$key_1)[$key_2],
														'qty'			=> $this->input->post('upload_qty_'.$key_1)[$key_2],
														'unit_cost'		=> str_replace(',', '', $this->input->post('upload_unit_cost_'.$key_1))[$key_2],
														'total_cost'	=> str_replace(',', '', $this->input->post('upload_total_cost_'.$key_1))[$key_2],
														'item_type'		=> $this->input->post('upload_type_'.$key_1)[$key_2]
										]);
				}
				
			}
		}
		GSS_PO_Model::save_po($po, $uploaded_po);
		return redirect('gss/head/po');
	}

	public function post_cancel_po(){
		$this->checkIfLoggedIn(1,'head');
		$id = $this->input->post('id');
		GSS_PO_Model::post_cancel_po($id);
	}
	public function post_delete_po(){
		$this->checkIfLoggedIn(1,'head');
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		GSS_PO_Model::post_delete_po($id,$status);
	}
	public function po_exist(){
		$id = $_POST['data'];
		echo GSS_PO_Model::po_exist($id);
	}
	public function edit_po(){
		$this->checkIfLoggedIn(1,'head');
		$po_id = $this->input->post('po_id');

		$upload_item =  $this->input->post('upload_item');
		$upload_desc =  $this->input->post('upload_desc');
		$upload_qty =  $this->input->post('upload_qty');
		$upload_unit_cost =  $this->input->post('upload_unit_cost');
		$upload_total_cost =  $this->input->post('upload_total_cost');
		$upload_type = $this->input->post('upload_type');

		$inventory_id =  $this->input->post('inventory_id');
		$inventory_item =  $this->input->post('inventory_item');
		$inventory_desc =  $this->input->post('inventory_desc');
		$inventory_qty =  $this->input->post('inventory_qty');
		$inventory_unit_cost =  $this->input->post('inventory_unit_cost');
		$inventory_total_cost =  $this->input->post('inventory_total_cost');
		$inventory_type = $this->input->post('inventory_type');
		$inventory_id = $this->input->post('inventory_id');

		$uploaded_items = [];
		if(count($upload_item) > 0){
			foreach ($upload_item as $key => $value) {
				array_push($uploaded_items, ['name' => $value, 'description' => $upload_desc[$key], 'qty' => $upload_qty[$key], 'unit_cost' => $upload_unit_cost[$key], 'total_cost' => $upload_total_cost[$key], 'item_type' => $upload_type[$key], 'type' => 'po', 'source' => 'csv', 'form_id' => $po_id]);
			}
		}
		
		$inventory_items = [];
		if(count($inventory_item) > 0){
			foreach ($inventory_item as $key => $value) {
				array_push($inventory_items, ['name' => $value, 'description' => $inventory_desc[$key], 'qty' => $inventory_qty[$key], 'unit_cost' => $inventory_unit_cost[$key], 'total_cost' => $inventory_total_cost[$key], 'item_type' => $inventory_type[$key], 'inventory_id' => $inventory_id[$key], 'type' => 'po', 'source' => 'inventory', 'form_id' => $po_id]);
			}
		}
		
		GSS_PO_Model::edit_po($po_id, $uploaded_items, $inventory_items);

		return redirect('gss/head/po');
	}
}