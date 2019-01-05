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
		$id = $_SESSION['userid'];
		// header('Location: ../resources/views/home.php');
		
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}
		$User = new User();
		
		$data = $User->getAllInfo($id);
		$pharmacistTable = $User->pharmacistTable($_SESSION['userid']);
		
		$this->config->view1('dashboard/userProfileView' , $data ,$pharmacistTable );	
	}
	// public function getUserOrder()
	// {
	// 	$id = $_SESSION['userid'];
		
	// 	if(!isset($_SESSION['user']))
	// 	{
	// 		$this->config->route('Pharmacy/login');
	// 	}
	// 	$User = new User();

	// 	$data = $User->get_order_product_details($id);
	// }
}
		// $data = array(
		// 				array( $User->getAllInfo($id))
		// 			);
		
		// $data2 = $User->get_order_product_details($id);
