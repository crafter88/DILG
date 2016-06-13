<?php

 class GSS_RIS_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

	private static function get_mapped_items($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'ris', 'form_id' => $value->sai_no])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}
	
	private static function get_mapped_items2($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'ris2', 'form_id' => $value->sai_no])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}

 	public static function pending_ris(){
 		$pending = self::$db->get_where('ris', ['status' => 'pending'])->result();
 		return self::get_mapped_items($pending);
 	}
	
 	public static function confirmed_ris(){
 		$confirmed = self::$db->get_where('ris', ['status' => 'confirmed'])->result();
 		return self::get_mapped_items($confirmed);
 	}
	
 	public static function rejected_ris(){
 		$rejected = self::$db->get_where('ris', ['status' => 'rejected'])->result();
 		return self::get_mapped_items2($rejected);
 	}
 	
 	public static function post_confirm_ris($id){
 		//self::$db->where('sai_no', $id)->update('ris', ['status' => 'confirmed']);
		$where = "sai_no='".$id."' ORDER BY id DESC LIMIT 1";
		self::$db->where($where)->update('ris', ['status' => 'confirmed']);
 	}
	
	public static function post_reject_ris($id){
 		self::$db->where('sai_no', $id)->update('ris', ['status' => 'rejected']);
		self::$db->where('id', $id)->update('sai', ['ris_status' => 'rejected']);
		self::$db->where('form_id', $id)->where('type', 'ris')->update('items', ['type' => 'ris2']);
 	}

 	public static function get_ppmp(){
 		$ppmp = self::$db->select('items.*')->from('items')->join('ppmp', 'ppmp.ppmp_id = items.form_id')->join('department', 'department.id = ppmp.dept_id')->where(['ppmp.flag' => '1', 'department.name' => 'GSS'])->get()->result();
 		return $ppmp;
 	}

 }