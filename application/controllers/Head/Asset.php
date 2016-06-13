<?php

class Asset extends MY_Controller{

	function __construct(){
		parent::__construct('Head');
	}

	public function get_asset(){
		$this->load->view($this->layout, ['content' => 'Head/content/Asset', 'js' => 'Head/js/Asset', 'nav' => 'asset']);
	}
}