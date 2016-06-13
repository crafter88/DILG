<?php 

class Accounts extends MY_Controller{
	
	function __construct(){
		parent::__construct('IT');
		
	}
	
	public function get_accounts(){
		return $this->load->view($this->layout, ['content' => 'IT/content/Accounts', 'js' => 'IT/js/Accounts', 'nav' => 'accounts']);
	}
	
	public function get_all_accounts(){
		echo json_encode(['data' => IT_Accounts_Model::get_all_users()]);
	}
	
	public function get_all_departments(){
		echo json_encode(IT_Accounts_Model::all_departments());
	}
	
	public function add_user(){
		$user_account = [
							'username' => $this->input->post('username'),
							'password' => md5($this->input->post('username')),
							'department' => $this->input->post('department'),
							'access_level' => 'head',
							'position' => $this->input->post('position'),
						];
		$user_profile = [
							'firstname' => $this->input->post('firstname'),
							'middlename' => $this->input->post('middlename'),
							'lastname' => $this->input->post('lastname'),
						];
						
		IT_Accounts_Model::add_user($user_account, $user_profile);
		return redirect('it/accounts_departments', 'refresh');
		
	}

	public function edit_user(){
		$user_account = [
							'user_account_id' => $this->input->post('user_account_id'),
							'username' => $this->input->post('username'),
							'password' => md5($this->input->post('username')),
							'department' => $this->input->post('department'),
							'access_level' => 'head',
							'position' => $this->input->post('position'),
						];
		$user_profile = [
							'user_profile_id' => $this->input->post('user_profile_id'),
							'firstname' => $this->input->post('firstname'),
							'middlename' => $this->input->post('middlename'),
							'lastname' => $this->input->post('lastname'),
						];

		IT_Accounts_Model::edit_user($user_account, $user_profile);
		return redirect('it/accounts_departments', 'refresh');
	}
}
?>