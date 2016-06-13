<?php

 class RIS_Model extends CI_Model{
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
 				$items = self::$db->get_where('items', ['type' => 'ris2', 'form_id' => $value->id])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}

 	public static function my_pending_ris(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$pending = self::$db->get_where('ris', ['status' => 'pending','user_id' => $id])->result();
			return self::get_mapped_items($pending);
		}
 	}
	
 	public static function my_confirmed_ris(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$confirmed = self::$db->get_where('ris', ['status' => 'confirmed','user_id' => $id])->result();
			return self::get_mapped_items($confirmed);
		}
 	}
	
 	public static function my_rejected_ris(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$rejected = self::$db->get_where('ris', ['status' => 'rejected','user_id' => $id])->result();
			return self::get_mapped_items2($rejected);
		}
 	}

	public static function my_cancelled_ris(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$confirmed = self::$db->get_where('ris', ['status' => 'cancelled','user_id' => $id])->result();
			return self::get_mapped_items($confirmed);
		}
 	}
	
 	public static function my_draft_ris(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$id = $CI->session->userdata('user_id');
			$rejected = self::$db->get_where('ris', ['status' => 'draft','user_id' => $id])->result();
			return self::get_mapped_items($rejected);
		}
 	}
	
	public static function all_sai(){
		$CI =& get_instance();
		$id = $CI->session->userdata('user_id');
 		//$all_sai = self::$db->get_where('sai', ['status' => 'confirmed', 'user_id' => $id])->result();
		$all_sai = self::$db->select('*')->from('sai')->where(['status' => 'confirmed', 'user_id' => $id, 'ris_status !=' => 'generated'])->get()->result();
 		return self::get_mapped_items_sai($all_sai);
 	}
	
	private static function get_mapped_items_sai($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['type' => 'sai', 'form_id' => $value->id])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}
	
	
	public static function save_ris($sai_id, $selected_sai_item_id, $inventory_items, $ris_date_created, $ris_status){
 		$sai = self::$db->get_where('sai', ['id' => $sai_id], 1)->result();
		$ris = self::$db->get_where('ris', ['id' => $ris_id], 1)->result();
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		$dept = $CI->session->userdata('department');
 		if(count($sai) > 0){
 			$sai_no = $sai[0]->sai_no;
			$ris_no = 0;
			if($ris){
				$ris_no = $ris[0]->ris_no;
			}
	 		self::$db->insert('ris', ['ris_no' => $ris_no, 'status' => 'pending', 'date_created' => $ris_date_created, 'sai_no' => $sai_id, 'user_id' => $user_id, 'dept_id' => $dept]);
	 		$ris_id = self::$db->insert_id();
	 		$sai_items = [];
	 		if(count($selected_sai_item_id) > 0){
				foreach ($selected_sai_item_id as $key => $value) {
		 			array_push($sai_items, self::$db->get_where('items', ['id' => $value], 1)->result()[0]);
		 		}
	 		}

	 		if(count($sai_items) > 0){
				foreach ($sai_items as $key => $value) {
		 			self::$db->insert('items', ['name' => $value->name, 'description' => $value->description, 'qty' => $value->qty, 'unit_cost' => $value->unit_cost, 'total_cost' => $value->total_cost, 'item_type' => $value->item_type, 'type' => 'ris', 'source' => $value->source, 'inventory_id' => $value->inventory_id, 'form_id' => $value->form_id]);
	 				
	 				if($ris_status === 'completed'){
	 					if($value->source === 'inventory'){
		 					self::$db->where('id', $value->inventory_id)->set('qty', 'qty+'.$value->qty, FALSE)->update('inventory');
		 				}else{
							$inventory = self::$db->get('inventory')->result();
							$new_item = false;
							foreach ($inventory as $key_1 => $value_1) {
								if($value_1->name === $value->name && $value_1->description === $value->description){
									self::$db->where('id', $value_1->id)->set('qty', 'qty+'.$value->qty, FALSE)->update('inventory');
									$new_item = false;
									break;
								}else{
									$new_item = true;
								}
							}
							if($new_item){
								self::$db->insert('inventory', ['name' => $value->name, 'description' => $value->description, 'qty' => $value->qty, 'unit_cost' => $value->unit_cost, 'total_cost' => $value->total_cost, 'type' => $value->item_type]);
							}
		 				}
	 				}
		 		}
	 		}

	 		if(count($inventory_items) > 0){
				foreach ($inventory_items as $key => $value) {
		 			self::$db->insert('items', ['name' => $value['name'], 'description' => $value['description'], 'qty' => $value['qty'], 'unit_cost' => $value['unit_cost'], 'total_cost' => $value['total_cost'], 'item_type' => $value['item_type'], 'type' => 'ris', 'source' => 'inventory', 'inventory_id' => $value['id'], 'form_id' => $iar_id]);
		 			
		 			if($iar_status === 'completed'){
		 				self::$db->where('id', $value['id'])->set('qty', 'qty+'.$value['qty'], FALSE)->update('inventory');
		 			}
		 		}
	 		}

	 		self::$db->where('id', $sai_id)->update('sai', ['ris_status' => 'generated']);
 		}
 			
 	}
 }