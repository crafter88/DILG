<?php

 class Items_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

	private static function get_mapped_items($record){
		$item_list = [];
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'ppmp', 'form_id' => $value->id])->result();
 				$item_list = $items;
 			}
 		}

 		return $item_list;
	}

	public static function current_quarter_items($dept_id){
		$ppmp = self::$db->get_where('ppmp', ['dept_id' => $dept_id, 'flag' => '1'])->result();
		$ppmp_items = self::get_mapped_items($ppmp);

		foreach ($ppmp_items as $key => &$value) {
		 	$inventory = self::$db->get_where('inventory', ['name' => $value->name, 'description' => $value->description])->result();

		 	if(count($inventory) > 0){
		 		if(floatval($value->qty) < floatval($inventory[0]->qty)){
		 			$value->available_qty = floatval($inventory[0]->qty) - floatval($value->qty);
		 			$value->inventory_id = $inventory[0]->id;
		 		}else{
		 			$value->available_qty = floatval($inventory[0]->qty);
		 			$value->inventory_id = $inventory[0]->id;
		 		}
		 	}else{
		 		$value->available_qty = 0;
		 		$value->inventory_id = 0;
		 	}
		 } 
		return $ppmp_items;
	}
}