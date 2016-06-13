<?php

class Accounting_IAR_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

 	private static function get_mapped_items($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'iar', 'form_id' => $value->po_id])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}

	public static function completed_iar(){
 		$completed = self::$db->get_where('iar', ['status' => 'completed'])->result();
 		return self::get_mapped_items($completed);
 	}
}