<?php

class GSS_IAR_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

 	private static function get_mapped_items_po($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['form_type' => 'po', 'form_id' => $value->id])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}

 	private static function get_mapped_items($record){
		if(count($record) > 0){
 			foreach ($record as $key => &$value) {
 				$items = self::$db->get_where('items', ['form_type' => 'iar', 'form_id' => $value->po_id])->result();
 				$value->items = $items;
 			}
 		}
 		return $record;
	}

	public static function completed_iar(){
 		$completed = self::$db->select('iar.id')->select('iar_no')->select('status')->select('date_created')->select('date_modified')->select('po_id')->select("CONCAT(user_profile.firstname,' ',user_profile.middlename,' ',user_profile.lastname) AS user_name")->select('created_by')->from('iar')->join('user_profile', 'iar.created_by = user_profile.id')->where('status','completed')->get()->result();
		return self::get_mapped_items($completed);
 	}

 	public static function draft_iar(){
 		$draft = self::$db->select('iar.id')->select('iar_no')->select('status')->select('date_created')->select('date_modified')->select('po_id')->select("CONCAT(user_profile.firstname,' ',user_profile.middlename,' ',user_profile.lastname) AS user_name")->select('created_by')->from('iar')->join('user_profile', 'iar.created_by = user_profile.id')->where('status','draft')->get()->result();
		return self::get_mapped_items($draft);
 	}
	
	public static function last_iar(){
 		return self::$db->select('*')->order_by('id', 'desc')->limit(1)->get('iar')->result();
 	}
	
	public static function all_iar(){
 		$all = self::$db->select('iar.id')->select('iar_no')->select('iar.status')->select('iar.date_created')->select('iar.date_modified')->select('po_id')->select('po_no')->select("CONCAT(user_profile.firstname,' ',user_profile.middlename,' ',user_profile.lastname) AS user_name")->select('created_by')->from('iar')->join('user_profile', 'iar.created_by = user_profile.id')->join('po', 'iar.po_id = po.id')->get()->result();
		return self::get_mapped_items($all);
 	}
	
	public static function incomplete_iar(){
 		$incomplete = self::$db->select('iar.id')->select('iar_no')->select('iar.status')->select('iar.date_created')->select('iar.date_modified')->select('po_id')->select('po_no')->select("CONCAT(user_profile.firstname,' ',user_profile.middlename,' ',user_profile.lastname) AS user_name")->select('created_by')->from('iar')->join('user_profile', 'iar.created_by = user_profile.id')->join('po', 'iar.po_id = po.id')->where('iar.status','incomplete')->get()->result();
		return self::get_mapped_items($incomplete);
 	}

 	public static function all_po(){
 		$all_po = self::$db->get_where('po', ['status' => 'confirmed', 'iar_status' => 'pending'])->result();
 		return self::get_mapped_items_po($all_po);
 	}

 	public static function inventory(){
 		return self::$db->get('inventory')->result();
 	}

 	public static function save_iar($po_id, $inventory_items, $iar_date_created, $iar_status,$iar_no){
		$CI =& get_instance();
		if ($CI->session->userdata('user_id')) {
			$po = self::$db->get_where('po', ['id' => $po_id], 1)->result();
			if(count($po) > 0){
				$po_no = $po[0]->po_no;
				self::$db->insert('iar', ['iar_no' => $iar_no, 'status' => $iar_status, 'date_created' => $iar_date_created, 'po_id' => $po_id, 'created_by' => $CI->session->userdata('user_id')]);
				$iar_id = self::$db->insert_id();
				$po_items = [];
				if(count($inventory_items) > 0){
					foreach ($inventory_items as $key => $value) {
						if((!isset($value['qty'])) || ($value['qty'] == "")){
							$value['qty'] = 0;
						}
						self::$db->insert('items', ['name' => $value['name'], 'description' => $value['description'], 'qty' => $value['qty'], 'unit_cost' => $value['unit_cost'], 'total_cost' => $value['total_cost'], 'item_type' => $value['item_type'], 'form_type' => 'iar', 'source' => 'inventory',  'form_id' => $po[0]->id]);
						
						/* if($iar_status === 'completed'){
							self::$db->where('id', $value['id'])->set('qty', 'qty+'.$value['qty'], FALSE)->update('inventory');
						} */
					}
				}
				if($iar_status != "draft"){
					self::$db->where('id', $po_id)->update('po', ['iar_status' => 'delivered']);
				}
			}
		}
 	}

 	public function edit_iar($iar_id, $po_id, $iar_status, $iar_date_created, $current_iar_items, $current_inventory_items){
 		self::$db->where('id', $po_id)->update('po', ['iar_status' => 'delivered']);
 		self::$db->where('id', $iar_id)->update('iar', ['status' => 'completed', 'date_modified' => $iar_date_created, 'po_id' => $po_id]);
 		$inventory = self::$db->get('inventory')->result();
 		foreach ($current_inventory_items as $key => $value) {
 			self::$db->insert('items', $value);
 		}

 		foreach ($current_iar_items as $key => $value) {
 			if($value['source'] === 'inventory'){
 				self::$db->where('id', $value['inventory_id'])->set('qty', 'qty+'.$value['qty'], FALSE)->update('inventory');
 			}else{
 				self::$db->insert('inventory', ['name' => $value['name'], 'description' => $value['description'], 'qty' => $value['qty'], 'unit_cost' => $value['unit_cost'], 'total_cost' => $value['total_cost'], 'type' => $value['type']]);
 			}
 		}
 		foreach ($current_inventory_items as $key => $value) {
 			self::$db->where('id', $value['inventory_id'])->set('qty', 'qty+'.$value['qty'], FALSE)->update('inventory');
 		}
 	}
	
	public static function iar_exist($id){
 		$query = self::$db->query("Select id from iar where iar_no='".$id."'");
		if($query->num_rows() > 0){
			return "Duplicate IAR No.";
		}else{
			return "Successful";
		} 
 	}

}