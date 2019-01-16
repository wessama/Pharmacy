<?php

require_once('app/Http/Controllers/Controller.php');

require('app/Billing.php');
require('app/User.php');
require('app/Order.php');


class BillingController
{
	private $config;
	
	public function __construct()
	{
		$this->config = new Controller();
	}

	public function index()
	{
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}
		
		$user = new User();
		$Product = new Product();
		
		$data['user_info'] = $user->getUserInfoById($_SESSION['userid']);
		
		$data['cartProducts'] = [];
		 
		foreach($_SESSION['cartProducts'] as $productID){
			$data['cartProducts'][] = $Product->getProductInfo($productID);
		}
		
		$data['total'] = 0;
		 
		foreach($data['cartProducts'] as $product){
			 $data['total'] += $product[0]['price'];
		}
		
		$this->config->view('dashboard/checkout' , $data);
	}
	public function store($request)
	{
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}

		if($request == NULL)
		{
			$_SESSION['empty_checkout_form'] = true;

			$this->config->route('billing');
		}
		else
		{

		$Billing = new Billing();
		
		$Order = new Order();

		$Billing->store($request);
		
		$billing_id = $Billing->getLastId();
		
		var_dump($billing_id[0]['id']);
		
		foreach($_SESSION['cartProducts'] as $product){
			
			$Order->store($product, $_SESSION['userid'], $billing_id[0]['id']);
		}
		
		$_SESSION['order_placed'] = true;
		
		unset($_SESSION['cart_empty_alert']);
		
		$this->config->route('home');
		}
	}

}