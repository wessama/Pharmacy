<?php

require_once('app/Http/Controllers/Controller.php');

require('app/User.php');

class RegisterController
{
	private $config;

	public function __construct()
	{
		$this->config = new Controller();
	}

	public function index()
	{
		$this->config->view('auth/register');
	}

	public function store($request)
	{

		$User = new User();
		
		if($User->getInfoByEmail($request['email']) != NULL) {

			$_SESSION['user_already_exists'] = true;

			$this->config->route('login');

		}else{

		$User->store($request);

		$_SESSION['registration_successful'];

		$this->config->route('home');
		
		}

	}
}