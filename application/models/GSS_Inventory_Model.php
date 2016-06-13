<?php

class GSS_Inventory_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

 	public static function inventory_record(){
 		$supply = self::$db->get('supply_inventory')->result();

 		$data = [];
 		foreach ($supply as $key => $value) {
 			array_push($data, ['name' => $value->name, 'description' => $value->description, 'qty' => $value->qty]);
 		}
 		return $data;
 	}

 	public static function gss_ppmp(){
 		$ppmp = self::$db->select('items.*')->from('items')->join('ppmp', 'ppmp.ppmp_id = items.form_id')->join('department', 'department.id = ppmp.dept_id')->where(['ppmp.flag' => '1', 'department.name' => 'GSS'])->get()->result();
 		return $ppmp;
 	}

 	public static function accounting_ppmp(){
 		$ppmp = self::$db->select('items.*')->from('items')->join('ppmp', 'ppmp.ppmp_id = items.form_id')->join('department', 'department.id = ppmp.dept_id')->where(['ppmp.flag' => '1', 'department.name' => 'Accounting'])->get()->result();
 		return $ppmp;
 	}

 	public static function it_ppmp(){
 		$ppmp = self::$db->select('items.*')->from('items')->join('ppmp', 'ppmp.ppmp_id = items.form_id')->join('department', 'department.id = ppmp.dept_id')->where(['ppmp.flag' => '1', 'department.name' => 'IT'])->get()->result();
 		return $ppmp;
 	}

 	public static function asset_inventory(){
 		//return self::$db->get('asset_inventory')->result();
 		$part = self::$db->select('asset_inventory.asset_no')->select('asset_name')->select('asset_description')->select('asset_inventory.emp_id')->select('asset_inventory.distinction_no')->
		select('asset_part_no')->select('asset_part_name')->select('asset_part_description')->from('asset_inventory')
 		->join('asset_part', 'asset_inventory.asset_no = asset_part.asset_no', 'left')
 		->get()->result();

 		return $part;
 	}

 	public static function add_parts($asset, $asset_part){
 		//self::$db->update('asset_inventory', ['asset_no' => $id]);
 		 foreach ($asset_part as $key => &$value) {
 			self::$db->insert('asset_part', $value);
 		}

 	}

}