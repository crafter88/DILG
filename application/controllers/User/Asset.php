<?php

class Asset extends MY_Controller{

	function __construct(){
		parent::__construct('User');
	}

	public function get_asset(){
		$this->load->view($this->layout, ['content' => 'User/content/Asset', 'js' => 'User/js/Asset', 'nav' => 'asset']);
	}
}