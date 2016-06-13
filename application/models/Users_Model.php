<?php

 class Users_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

 	public static function all(){
 		return self::$db->select('*')->from('users')->join('user_profile', 'user_profile.user_credential = users.id')->get()->result();
 	}

 	public static function pending(){
 		return self::$db->select('*')->from('users')->where('access_level', 'pending')->join('user_profile', 'user_profile.id = users.id')->get()->result();
 	}
 }