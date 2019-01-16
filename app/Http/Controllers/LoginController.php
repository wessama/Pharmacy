<?php

require_once('app/Http/Controllers/Controller.php');

require('app/User.php');

class LoginController
{
	private $config;

	public function __construct()
	{
		$this->config = new Controller();
	}

	public function index()
	{
		$this->config->view('auth/login');
	}

	public function logIn($request)
	{
		$email = $request['email'];
		$password = $request['password'];
		
		$User = new User();

		$data = $User->getInfoByEmail($email);

		if(password_verify($password, $data[0]['password'])){
			
			$_SESSION['user'] = $data[0]['name'];
			$_SESSION['userid'] = $data[0]['id'];
			$_SESSION['user_role'] = $data[0]['role_id'];

			$this->set_permissions($_SESSION['userid']);

			$this->config->route('home');		
		}else{
            
			$_SESSION['incorrect_password'] = true;

			$this->config->route('login');
	    }

	    
	}

	public function set_permissions($user_id){

		$User = new User();

		$role_id = $User->getUserRoleId($user_id);
		
		$PermissionRole = new PermissionRole();

		$Permission = new Permission();

		$permission_ids = $PermissionRole->get_role_permissions_id($role_id[0]['role_id']);

		$_SESSION['permissions'] = [];

		foreach($permission_ids as $permission_id){

			$PermissionItem = $Permission->get_permission_by_id($permission_id);

			$_SESSION['permissions'][] = $PermissionItem[0]['permission'];

		}

	}
}