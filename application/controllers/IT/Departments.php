<?php

class Departments extends MY_Controller{
	
	function __construct(){
		parent::__construct('IT');
	}
	
	public function all_departments(){
		echo json_encode(['data' => IT_Departments_Model::all_departments()]);
	}
	
	public function add_departments(){
		$department = $this->input->post('name');
		IT_Departments_Model::add_departments($department);
		return redirect('it/accounts_departments', 'refresh');
	}

	public function edit_department(){
		$department = [
						'id' => $this->input->post('id'),
						'name' => $this->input->post('name')
					];
		IT_Departments_Model::edit_department($department);
		return redirect('it/accounts_departments', 'refresh');
	}
	
}

?>