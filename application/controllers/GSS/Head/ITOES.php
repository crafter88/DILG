<?php

class ITOES extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_itoes(){
		$this->load->view($this->layout, ['content' => 'GSS/content/IT_OES', 'js' => 'GSS/js/IT_OES', 'nav' => 'itoes']);
	}
}