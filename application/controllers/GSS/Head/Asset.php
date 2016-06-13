<?php

class Asset extends MY_Controller{

	function __construct(){
		parent::__construct('GSS');
	}

	public function get_asset(){
		$this->load->view($this->layout, ['content' => 'GSS/content/Asset', 'js' => 'GSS/js/Asset', 'nav' => 'asset']);
	}
}