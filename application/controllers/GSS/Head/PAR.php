<?php

class PAR extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_par(){
		$this->load->view($this->layout, ['content' => 'GSS/content/PAR', 'js' => 'GSS/js/PAR', 'nav' => 'par']);
	}

	public function last_par(){
		echo json_encode(GSS_PAR_Model::last_par());
	}

	public function inventory(){
		echo json_encode(GSS_PAR_Model::inventory());
	}

	public function all_par(){
		echo json_encode(['data' => GSS_PAR_Model::all_par()]);
	}

	public function completed_par(){
		echo json_encode(['data' => GSS_PAR_Model::completed_par()]);
	}

	public function draft_par(){
		echo json_encode(['data' => GSS_PAR_Model::draft_par()]);
	}

	public function all_dept(){
		echo json_encode(GSS_PAR_Model::all_dept());
	}

	public function all_emp(){
		echo json_encode(GSS_PAR_Model::all_emp());
	}

	public function save_par(){
		$par_no = $this->input->post('par_no');
		$asset_name = $this->input->post('asset_name');
		$asset_desc = $this->input->post('asset_desc');
		//$asset_desc = $this->input->post('asset_desc');
		$office = $this->input->post('office');
		$employee = $this->input->post('employee');
		$par_status = $this->input->post('par_status');
		$par_date_created = $this->input->post('par_date_created');

		$user = $this->input->post('user');
		$today =  date('Y-m-d');
		//$today =  date_format($today, 'F j, Y');

		$office = substr((strtoupper($office)), 0, 3);
		$year = date('Y');
		$code = substr($par_no, 4, 1);
		$asset_no = $office.'-'.$year.'-'.$code;

		//$par = ['par_no' => $par_no, 'asset_no' => $asset_no, 'emp_id' => $user, 'status' => $par_status, 'date_created' => $today];
		
		$asset = ['asset_no' => $asset_no, 'asset_name' => $asset_name, 'asset_description' => $asset_desc, 'emp_id' => $employee];



		GSS_PAR_Model::save_par($par);

		return redirect('gss/head/par');
	}

	public function edit_par(){
		$par_id = $this->input->post('par_id');

		//$asset_name = $this->input->post('asset_name');
		$asset_name = $this->input->post('current_asset_name');
		//$asset_desc = $this->input->post('asset_desc');
		$office = $this->input->post('current-par-office');
		$employee = $this->input->post('current-par-employee');
		$par_status = $this->input->post('par_status');
		$par_date_created = $this->input->post('par_date_created');
		
		$today =  date('Y-m-d');
		//$par = ['asset' => $asset_name, 'office' => $office, 'employee' => $employee, 'status' => $par_status, 'date_created' => $today];

		GSS_PAR_Model::edit_par($par_id, $asset_name, $office, $employee, $today);

		return redirect('gss/head/par');
	}

}

// to do:
// -x show items in the Add button (Inventory of Assets)
// -x insert this in the database
// -x show the AREs in the database to the UI of list of assets
// -x change ARE No. 
// -x view button
// -x show the selected asset from the Add button to the Asset and Desc column (Generate ARE modal)
// -x draft function
// -x change date created
// - edit are functionality (changing asset only)
// -x dropdown should be from database
// -x are_no is being repeated
// -x generate property card in the completed table
// -x place items from that ARE to the generate property card modal
// - add from list of assets

// -x display created by column
// -x all tab
// - insert to asset table and emp table
// - correct the display in the tables
// - parts function in the inventory