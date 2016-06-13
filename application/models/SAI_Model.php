<?php

class SAI_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

	private static function get_mapped_items($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'sai', 'form_id' => $value->id])->result();
 				$value->items = $items;
				foreach($items as $key2 => &$value2){
					$form = self::$db->select('ppmp.id')->from('ppmp')->join('sai', 'sai.dept_id = ppmp.dept_id')->where(['flag' => 1])->get()->result();
					$maxQ = self::$db->select('qty')->from('items')->where(['type' => 'ppmp', 'form_id' => $form[0]->id, 'name' => $value->items[$key2]->name])->get()->result();
					//$value->items[$key2]->maxQty = $maxQ[0]->qty;
				}
 			}
 		}
 		return $record;
	}

	private static function get_mapped_ppmp_items($record){
		$item_list = [];
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'ppmp', 'form_id' => $value->id])->result();
 				$item_list = $items;
 			}
 		}

 		return $item_list;
	}

	public static function all_sai($condition){
		$data = self::$db->get_where('sai', $condition)->result();
		return self::get_mapped_items($data);
	}

	public static function ppmp_items($dept_id){
		$ppmp = self::$db->get_where('ppmp', ['dept_id' => $dept_id, 'flag' => '1'])->result();
		$ppmp_items = self::get_mapped_ppmp_items($ppmp);

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

	public static function last_sai(){
		return self::$db->select('sai_no')->order_by('id',"desc")->limit(1)->get('sai')->row();
	}

	public static function save_sai($sai, $inventory_items){
 		self::$db->insert('sai', $sai);
 		$id = self::$db->insert_id();
 		foreach ($inventory_items as $key => &$value) {
 			$value['form_id'] = $id;
 			self::$db->insert('items', $value);
			
 		}
 	}
	
	public static function pending_sai(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$data = self::$db->get_where('sai', ['status' => 'pending','user_id' => $id])->result();
			return self::get_mapped_items($data);
		}
	}
	
	public static function rejected_sai(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$data = self::$db->get_where('sai', ['status' => 'rejected','user_id' => $id])->result();
			return self::get_mapped_items($data);
		}
	}
	
	public static function cancelled_sai(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$data = self::$db->get_where('sai', ['status' => 'cancelled','user_id' => $id])->result();
			return self::get_mapped_items($data);
		}
	}
	
	public static function confirmed_sai(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$data = self::$db->get_where('sai', ['status' => 'confirmed','user_id' => $id])->result();
			return self::get_mapped_items($data);
		}
	}
	
	public static function draft_sai(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$data = self::$db->get_where('sai', ['status' => 'draft','user_id' => $id])->result();
			return self::get_mapped_items($data);
		}
	}
	
	public static function all_pending_sai(){
		$data = self::$db->get_where('sai', ['status' => 'pending'])->result();
		return self::get_mapped_items($data);
	}
	
	public static function all_rejected_sai(){
		$data = self::$db->get_where('sai', ['status' => 'rejected'])->result();
		return self::get_mapped_items($data);
	}
	
	public static function all_confirmed_sai(){
		$data = self::$db->get_where('sai', ['status' => 'confirmed'])->result();
		return self::get_mapped_items($data);
	}
	
	
	public static function post_cancel_sai($id){
		self::$db->where('id', $id)->update('sai', ['status' => 'cancelled']);
 	}
	
	public static function inventory(){
 		return self::$db->get_where('items', ['type' => 'ppmp'])->result();
 	}
	
	/* public static function save_sai($sai_no, $date_created, $user_id, $department, $items_id, $inventory_id, $index, $requested_qty){
		self::$db->insert('sai', ['sai_no' => $sai_no, 'date_created' => $date_created, 'user_id' => $user_id, 'dept_id' => $department, 'status' => 'pending']);
		$id = self::$db->insert_id();
		if(count($items_id) > 0){
			foreach ($items_id as $key => $value) {
				$item = self::$db->get_where('items', ['id' => $value])->result()[0];
				$qty = $requested_qty[floatval($index[$key])];
				$id_inventory = $inventory_id[$key];
				$source = 'inventory';
				$type = 'sai';
				$form_id = $id;

				self::$db->insert('items', ['name' => $item->name, 'description' => $item->description, 'qty' => $qty, 'unit_cost' => $item->unit_cost, 'total_cost' => (floatval($item->unit_cost) * floatval($qty)), 'type' => $type, 'source' => $source, 'inventory_id' => $id_inventory, 'item_type' => 'supply', 'form_id' => $form_id]);
			}
		}
	} */
	
	public static function post_confirm_ris($id){
 		self::$db->where('id', $id)->update('sai', ['status' => 'confirmed']);
 	}
 	public static function post_reject_ris($id){
 		self::$db->where('id', $id)->update('sai', ['status' => 'rejected']);
 	}

}