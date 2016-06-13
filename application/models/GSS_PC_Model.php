<?php

 class GSS_PC_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

	public static function generated_pc(){
 		$completed = self::$db->get('pc')->result();
 		return $completed;
 	}

	public static function last_pc(){
 		return self::$db->select('*')->order_by('id')->limit(1)->get('pc')->result();
 	}

 	public static function save_pc($pc){
 		self::$db->insert('pc', $pc);
 		$id = self::$db->insert_id();
 		
 	}

 }