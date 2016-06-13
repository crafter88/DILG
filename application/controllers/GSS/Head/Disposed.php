<?php

class Disposed extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_disposed(){
		$this->load->view($this->layout, ['content' => 'GSS/content/Disposed', 'js' => 'GSS/js/Disposed', 'nav' => 'disposed']);
	}
}