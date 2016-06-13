<?php

class Account extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function get_login(){
		if($this->session->userdata('access_level')==='superadmin'){
			//redirect('accounting/head/po', 'refresh');
		}else 
		if($this->session->userdata('department') == 2){
			if($this->session->userdata('access_level') === 'head'){
				redirect('accounting/head/po', 'refresh');
			}
		}else
		if($this->session->userdata('department') == 3){
			if($this->session->userdata('access_level') === 'head'){
				redirect('gss/head/po', 'refresh');
			}
		}else{
			if($this->session->userdata('access_level') === 'head'){
				redirect('head/ppmp', 'refresh');
			}else if($this->session->userdata('access_level') === 'user'){
				redirect('user/sai', 'refresh');
			}else{
				$this->load->view('login');
			}
		}
	}

	public function get_register(){
		$this->load->view('register');
	}

	public function post_register(){
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));
		$department = trim($this->input->post('department'));

		$firstname = trim($this->input->post('firstname'));
		$middlename = trim($this->input->post('middlename'));
		$lastname = trim($this->input->post('lastname'));

		$access_level = ($department === 'superadmin') ? 'super admin' : trim($this->input->post('access_level'));

		if(strlen($username) > 0 && strlen($password) > 0 && strlen($department) > 0 && strlen($access_level) > 0 && strlen($firstname) > 0 && strlen($middlename) > 0 && strlen($lastname) > 0){
			Account_Model::register($username, $password, $department, $access_level, $firstname, $middlename, $lastname);
			return redirect('/');
		}else{
			return redirect('register');
		}
	}

	public function post_login(){
		$username = trim($this->input->post('username'));
 		$password = trim($this->input->post('password'));
 		
 		if(strlen($username) > 0 && strlen($password) > 0){
 			$user = Account_Model::login($username, $password);
 			if($user){
 				$this->session->set_userdata('user_id', $user->user_account_id);
				$this->session->set_userdata('user_full_name', $user->firstname.' '.$user->middlename.' '.$user->lastname);
				$this->session->set_userdata('department', $user->department);
				$this->session->set_userdata('access_level', $user->access_level);
				$this->session->set_userdata('user_first_name', $user->firstname);
				$this->session->set_userdata('user_last_name', $user->lastname);
				$this->session->set_userdata('user_middle_name', $user->middlename);
				
 				if($user->name === 'Accounting'){
 					if($user->access_level === 'head'){
 						return redirect('accounting/head/po', 'refresh');
 					}
 				}else if($user->name === 'GSS'){
 					if($user->access_level === 'head'){
 						return redirect('gss/head/po', 'refresh');
 					}
 				}else if($user->name === 'IT'){
 					if($user->access_level === 'head'){
 						return redirect('it/ris', 'refresh');
 					}
 				}else{
 					// if($user->access_level === 'head'){
 					// 	return redirect('head/ppmp', 'refresh');
 					// }else{
 					// 	return redirect('user/sai', 'refresh');
 					// }
 				}
 				/**if($user['access_level'] === 'head'){
 					$this->session->set_userdata('logged_in', $data['users_id']);
 					
 				}
 				if($data['access_level'] === 'accounting'){
 					$this->session->set_userdata('logged_in', $data['users_id']);
 					
 				}
 				if($data['access_level'] === 'head'){
 					$this->session->set_userdata('logged_in', $data['users_id']);
 					return redirect('head/ppmp', 'refresh');
 				}**/
 			// 	switch ($user->access_level) {
				// 	case "super admin":
				// 		return redirect ('super_admin/users', 'refresh');
				// 		break;
				// 	case "head":
				// 		switch ($user->department) {
				// 			case '2':
				// 				return redirect ('accounting/head/po', 'refresh');
				// 				break;
				// 			case '3':
				// 				return redirect ('gss/head/po', 'refresh');
				// 				break;
				// 			default:
				// 				return redirect ('head/ppmp', 'refresh');
				// 				break;
				// 		}
				// 		break;
				// 	case "user":
				// 		return redirect ('user/sai', 'refresh');
				// 		break;
				// 	case "it":
				// 		return redirect ('it/sai', 'refresh');
				// 		break;	
				// 	default:
							
				// }
 			}else{
				$this->session->set_flashdata('error', 'Wrong username and password combination.');
 				return redirect('/');
 			}

 		}else{
			$this->session->set_flashdata('error', 'Wrong username and password combination.');
 			return redirect('/');
 		}

	}


}