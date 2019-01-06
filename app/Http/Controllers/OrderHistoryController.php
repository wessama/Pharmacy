<?php


// require('app/dependencies/PDOConnection.php');
require_once('app/Http/Controllers/Controller.php');
require('app/User.php');


class OrderHistoryController
{
	private $config;


	public function __construct(){
		$this->config = new Controller();
	}

	public function index()
	{
		$id = $_SESSION['userid'];
		
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}
		$User = new User();
		$role = $User->getUserTypeNumber($id);
		var_dump($role);
		if ($role[0]["role_id"] == 3) {
			
			$data = $User->getAllInfo($id);
		}
		$this->config->view('dashboard/orderHistoryView' , $data);	
		// $pharmacistTable = $User->pharmacistTable($_SESSION['userid']);
		// $this->config->view1('dashboard/orderHistoryView' , $data ,$pharmacistTable );	
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
