<?php

class IT_Departments_Model extends CI_Model{
	private static $db;
	
	function __construct(){
		parent::__construct();
		self::$db =& get_instance()->db;
	}
	
	public static function all_departments(){
		return self::$db->get('department')->result();
	}
	
	public static function add_departments($name){
		return self::$db->insert('department', ['name' => $name]);
	}

	public static function edit_department($department){
		return self::$db->where('id', $department['id'])->update('department', ['name' => $department['name']]);
	}
}
?>