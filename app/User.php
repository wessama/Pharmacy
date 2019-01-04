<?php

require_once('app/Http/Controllers/Controller.php');

class User
{
	protected $config;

	public function __construct(){
		
		$this->config = new Controller();
	}

	public function getInfo($email)
	{
		$User = $this->config->getInstance();

		$query = $User->query("SELECT * FROM `user` WHERE `email` = '$email'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getInfoById($id)
	{

		$User = $this->config->getInstance();

		$query = $User->query("SELECT * FROM `user` WHERE `id` = '$id'");
		var_dump($query);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}


	public function store($request)
	{
		$User = $this->config->getInstance();

		$firstname = $request['firstname'];
		$email = $request['email'];
		$password = password_hash($request['pwd'], PASSWORD_DEFAULT);
		$gender = $request['gender'];


		//standard query builder
		$User->query("INSERT INTO `user`(`name`, `email`, `password`, `gender_id`, `role_id`) VALUES ('$firstname', '$email', '$password', '$gender', 3)");
	}

}