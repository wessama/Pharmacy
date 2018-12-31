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

		$data = $User->getInfo($email);

		if(password_verify($password, $data[0]['password'])){
			
			$this->config->route('home');

			$_SESSION['user'] = $data[0]['name'];
		}else
		{
            echo "<script>alert('Wrong Username or Password');</script>";		
	    }

	    
	}
}