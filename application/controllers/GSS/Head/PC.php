<?php

class PC extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_pc(){
		$this->load->view($this->layout, ['content' => 'GSS/content/PC', 'js' => 'GSS/js/PC', 'nav' => 'pc']);
	}

	public function generated_pc(){
		echo json_encode(['data' => GSS_PC_Model::generated_pc()]);
	}

	public function last_pc(){
		echo json_encode(GSS_PC_Model::last_pc());
	}
	public function save_pc(){
		$ppe_no = $this->input->post('ppe_no');
		$asset_name = $this->input->post('pc-asset-name');
		//$office = $this->input->post('office');
		$employee = $this->input->post('pc-employee');
		$pc_status = $this->input->post('pc-status');
		$pc_date_created = $this->input->post('pc-date-created');
		
		$today =  date('Y-m-d');
		$pc = ['pc_no' => $ppe_no, 'asset' => $asset_name, 'employee' => $employee, 'status' => $pc_status, 'date_created' => $pc_date_created];

		GSS_PC_Model::save_pc($pc);

		return redirect('gss/head/pc');
	}
}