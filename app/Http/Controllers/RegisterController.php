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

		$User->store($request);

	}
}