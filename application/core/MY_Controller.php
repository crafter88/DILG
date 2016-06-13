<?php

class MY_Controller extends CI_Controller{
	
	public $layout;
	
	function __construct($layout){
		$this->layout = $layout;
		parent::__construct();
	}
	
	function checkIfLoggedIn($dept,$access_level){
		if ($this->session->userdata('user_id')){
			if (($this->session->userdata('department')==$dept)&&($this->session->userdata('access_level')==$access_level)){
			}else if($this->session->userdata('access_level')==='superadmin'){
			}else{
				if($this->session->userdata('department') == 2){
 					if($this->session->userdata('access_level') === 'head'){
						$this->session->set_flashdata('error', 'You do not have the right access for that action.');
						redirect('accounting/head/po', 'refresh');
 					}
 				}else if($this->session->userdata('department') == 3){
 					if($this->session->userdata('access_level') === 'head'){
						$this->session->set_flashdata('error', 'You do not have the right access for that action.');
						redirect('gss/head/po', 'refresh');
 					}
 				}else{
 					if($this->session->userdata('access_level') === 'head'){
						$this->session->set_flashdata('error', 'You do not have the right access for that action.');
 						redirect('head/ppmp', 'refresh');
 					}else{
						$this->session->set_flashdata('error', 'You do not have the right access for this action.');
 						redirect('user/sai', 'refresh');
 					}
 				}
			}
		}else{ 
			$this->session->set_flashdata('error', 'You are not Logged In.');
            redirect('/','refresh');
        }
	}
}