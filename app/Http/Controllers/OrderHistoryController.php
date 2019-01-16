<?php


require_once('app/Http/Controllers/Controller.php');
require('app/User.php');
require('app/Order.php');


class OrderHistoryController
{
	private $config;


	public function __construct(){

		$this->config = new Controller();

	}

	public function index()
	{
		$user_id = $_SESSION['userid'];
		
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}

		$Order = new Order();
		
		$query = $Order->getPreviousOrders($user_id);	

		$tableData = array("Order Number", "Produt Name", "Product Quantity", "Product Price", "Product Category","Order Date");
		
		$data = array($tableData, $query);

		$this->config->view('dashboard/order-history' , $data);	
		
	}


}



