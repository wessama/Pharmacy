<?php

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
		$id = $_SESSION['userid'];
		
		if(!isset($_SESSION['user'])){
			$this->config->route('Pharmacy/login');
		}

		$User = new User();

		$data = $User->getInfoById($id);
		
		$this->config->view('dashboard/profile' , $data);	
	}
	
}
	