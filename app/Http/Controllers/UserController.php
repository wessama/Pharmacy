<?php


// require('app/dependencies/PDOConnection.php');
require_once('app/Http/Controllers/Controller.php');
require('app/User.php');


class UserController
{
	private $config;


	public function __construct()
	{

		$this->config = new Controller();
	}

	public function index()
	{
		// header('Location: ../resources/views/home.php');
		
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}
		$User = new User();

		var_dump($_SESSION['userid']);
		$data = $User->getInfoById($_SESSION['userid']);

		$this->config->view('dashboard/userProfileView' , $data);	
	}
}
