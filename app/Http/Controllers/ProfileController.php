<?php


// require('app/dependencies/PDOConnection.php');
require_once('app/Http/Controllers/Controller.php');
require('app/User.php');


class ProfileController
{
	private $config;


	public function __construct()
	{
		$this->config = new Controller();
	}

	public function index()
	{
		$id = $_SESSION['userid'];
		// header('Location: ../resources/views/home.php');
		if(!isset($_SESSION['user'])){
			$this->config->route('Pharmacy/login');
		}

		$User = new User();
		$data = $User->getUserInfo($id);
		
		
		$this->config->view('dashboard/userProfileView' , $data);	
	}
	
}
	