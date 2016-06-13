<?php

 class GSS_PAR_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

	private static function get_mapped_items($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'par', 'form_id' => $value->id])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}

	public static function last_par(){
 		return self::$db->select('*')->order_by('id','desc')->limit(1)->get('par')->result();
 	}

 	public static function inventory(){
 		$completed = self::$db->get_where('inventory', ['type' => 'asset'])->result();
 		return $completed;
 	}

	public static function all_par(){
 		return self::$db->get('par')->result();
 	}

	public static function completed_par(){
 		$completed = self::$db->get_where('par', ['status' => 'completed'])->result();
 		return $completed;
 	}

 	public static function draft_par(){
 		$draft = self::$db->get_where('par', ['status' => 'draft'])->result();
 		return $draft;
 	}

 	public static function all_emp(){
 		return self::$db->select('firstname, lastname')->order_by('id')->get('user_profile')->result();
 	}

 	public static function all_dept(){
 		return self::$db->select('*')->order_by('name')->get('department')->result();
 	}


 	public static function save_par($par){
 		self::$db->insert('par', $par);
 		$id = self::$db->insert_id();
 		
 	}

 	public static function edit_par($par_id, $asset_name, $office, $employee, $today){
 		//self::$db->where('form_id', $id)->delete('items');
 		self::$db->where('id', $par_id)->update('par', ['status' => 'completed', 'asset' => $asset_name, 'office' => $office, 'employee' => $employee, 'date_created' => $today]);

 		// if(count($uploaded) > 0){
 		// 	foreach($uploaded as $key => $value){
 		// 		self::$db->insert('items', $value);
 		// 	}
 		// }

 		// if(count($inventory) > 0){
 		// 	foreach($inventory as $key => $value){
 		// 		self::$db->insert('items', $value);
 		// 	}
 		// }
 	}
 }