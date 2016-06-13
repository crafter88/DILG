<?php

class WMR extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_wmr(){
		$this->load->view($this->layout, ['content' => 'GSS/content/WMR', 'js' => 'GSS/js/WMR', 'nav' => 'wmr']);
	}
}