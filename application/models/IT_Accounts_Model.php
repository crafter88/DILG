<?php

class IT_Accounts_Model extends CI_Model{
	private static $db;
	
	function __construct(){
		parent::__construct();
		self::$db =& get_instance()->db;
	}
	
	public static function get_all_users(){
		return self::$db->select('user_account.*, user_account.id AS user_account_id, user_profile.*, user_profile.id AS user_profile_id, department.*, department.id AS department_id')->from('user_account')->join('department', 'user_account.department = department.id')->join('user_profile', 'user_account.id = user_profile.user_account')->get()->result();
	}
	
	public static function all_departments(){
		return self::$db->get('department')->result();
	}
	
	public static function add_user($user_account, $user_profile){
		self::$db->insert('user_account', [
											'username' => $user_account['username'],
											'password' => $user_account['password'],
											'department' => $user_account['department'],
											'access_level' => $user_account['access_level'],
											'position' => $user_account['position'],
										]);
		$user_account_id = self::$db->insert_id();
		
		self::$db->insert('user_profile', [
											'firstname' => $user_profile['firstname'],
											'middlename' => $user_profile['middlename'],
											'lastname' => $user_profile['lastname'],
											'user_account' => $user_account_id,
										
										]);
	}

	public static function edit_user($user_account, $user_profile){
		self::$db->where('id', $user_account['user_account_id'])->update('user_account', ['username' => $user_account['username'], 'password' => $user_account['password'], 'department' => $user_account['department'], 'access_level' => $user_account['access_level'], 'position' => $user_account['position']]);

		self::$db->where('id', $user_profile['user_profile_id'])->update('user_profile', ['firstname' => $user_profile['firstname'], 'middlename' => $user_profile['middlename'], 'lastname' => $user_profile['lastname'], 'user_account' => $user_account['user_account_id']]);
	}
}
?>