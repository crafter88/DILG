<?php

class OEJ extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_oej(){
		$this->load->view($this->layout, ['content' => 'GSS/content/OEJ', 'js' => 'GSS/js/OEJ', 'nav' => 'oej']);
	}
}