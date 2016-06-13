<?php

class Logout extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}

}