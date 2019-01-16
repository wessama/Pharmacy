<?php

require_once('app/Http/Controllers/Controller.php');

require('app/Permission.php');
require('app/PermissionRole.php');
require('app/Role.php');

class User
{
	protected $config;

	public function __construct(){
		
		$this->config = new Controller();
	}

	public function getInfoByEmail($email)
	{
		$User = $this->config->getInstance();

		$query = $User->query("SELECT * FROM `user` WHERE `email` = '$email'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getInfoById($id)
	{
		$User = $this->config->getInstance();

		$query = $User->query("SELECT * FROM gender INNER JOIN user ON gender.id=user.gender_id WHERE user.id = '$id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getUserInfoById($id)
	{
		$User = $this->config->getInstance();

		$query = $User->query("SELECT * FROM `user` WHERE id = '$id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}


	public function getAllUsers()
	{
		$User = $this->config->getInstance();
		
		$query = $User->query("SELECT u.id, u.name , u.email  
								FROM `user`u
								");
		
										
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function store($request)
	{
		$User = $this->config->getInstance();
		$name = filter_var($request['firstname'].' '.$request['lastname'], FILTER_SANITIZE_STRING);
		$email = filter_var($request['email'], FILTER_SANITIZE_EMAIL);
		$password = password_hash($request['pwd'], PASSWORD_DEFAULT);
		$gender = filter_var($request['gender'], FILTER_SANITIZE_NUMBER_INT);
		$number = filter_var($request['number'], FILTER_SANITIZE_STRING);
		$dateofbirth = filter_var($request['dob'], FILTER_SANITIZE_STRING);

		$User->query("INSERT INTO 
			`user`(
			`name`, 
			`email`, 
			`password`, 
			`gender_id`, 
			`Number`, 
			`DOB`) VALUES 
			('$name', 
			'$email', 
			'$password', 
			'$gender', 
			'$number', 
			'$dateofbirth')");
	}

	public function getUserRoleId($user_id)
	{
		$User = $this->config->getInstance();

		$query = $User->query("SELECT `role_id` FROM `user` WHERE `id` = '$user_id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function updateRole($user_id, $role_id)
	{
		$User = $this->config->getInstance();

		$query = $User->query("UPDATE `user` SET `role_id` = '$role_id' WHERE `id` = '$user_id'");
	}

	public static function can($permission){

		if(isset($_SESSION['user_id'])){
			$User = (new User)->getUserRoleId($_SESSION['user_id']);
		}else{
			$User[0]['role_id'] = 3;
		}
		
		$Permission = (new Permission)->get_permission($permission);

		$PermissionRole = (new PermissionRole)->check_permission($Permission[0]['id'], $User[0]['role_id']);

		if($PermissionRole == true){
			return true;
		}else{
			return false;
		}

	}

}