<?php
require_once('app/Http/Controllers/Controller.php');
require('app/User.php');
require('app/Role.php');


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
		$Role = new Role();
		$roleID = $Role->getUserTypeNumber($id);
		//in case u want to see pharmacist table for testing ... uncomment the next line
		// $roleID[0]["role_id"] = 2;
		if ($roleID[0]["role_id"] == 3) 
		{
			$query = $User->getUserTable($id);	
			$culomnNames = array("Order Number", "Produt Name", "Product Quantity", "Product Price", "Product Category","Order Date");
		}			
		else if ($roleID[0]["role_id"] == 2) 
		{
			$query = $User->getPharmacistTable($id);
			$culomnNames = array("Order Number", "user Name", "user email","Order Date" , "status");
		}			
		$data = array( $culomnNames , $query);
		$this->config->view('dashboard/orderHistoryView' , $data);	
		
	}
}



