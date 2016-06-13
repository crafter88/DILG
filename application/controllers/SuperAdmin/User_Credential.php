<?php

class User_Credential extends MY_Controller{

	function __construct(){
		parent::__construct('SuperAdmin');
		if(!($this->session->userdata('logged_in'))) return redirect('/', 'refresh');
	}

	public function get_users(){
		$this->load->view($this->layout, ['content' => 'SuperAdmin/content/User_Credential', 'js' => 'SuperAdmin/js/User_Credential', 'nav' => 'user_credential']);
	}
	public function get_users_all(){
		echo json_encode(['data' => Users_Model::all()]);
	}
	public function get_users_pending(){
		echo json_encode(['data' => Users_Model::pending()]);
	}
}