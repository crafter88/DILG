<?php

 class Account_Model extends CI_Model{
 	private static $db;

 	function __construct(){
 		parent::__construct();
 		self::$db = &get_instance()->db;
 	}

 	public static function register($username, $password, $department, $access_level, $firstname, $middlename, $lastname){
 		self::$db->insert('user_account', ['username' => $username, 'password' => md5($password), 'department' => $department, 'access_level' => $access_level]);
 		$id = self::$db->insert_id();
 		self::$db->insert('user_profile', ['firstname' => $firstname, 'middlename' => $middlename, 'lastname' => $lastname, 'user_account' => $id]);
 	}

 	public static function login($username, $password){
 		$user = self::$db->select('*, user_account.id AS user_account_id, department.id AS department_id, user_profile.id AS user_profile_id')->from('user_account')->join('department', 'department.id = user_account.department')->join('user_profile', 'user_profile.user_account = user_account.id')->where(['username' => $username, 'password' => md5($password)])->get()->result();

 		if(count($user) > 0){
	 		return $user[0];

 		}else{
 			return false;
 		}
 		
 	}
 }