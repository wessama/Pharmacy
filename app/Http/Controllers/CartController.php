<?php

require_once('app/Http/Controllers/Controller.php');
require('app/Cart.php');
class CartController
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

		$this->config->view('dashboard/cartView');
	}
	public function addToCart()
	{
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}

		 $Cart = new Cart();
		 		 
		
		 $productsId = $_SESSION['cartProducts'];
		 $order = $Cart->orderInfoINCart($productsId);
		 $this->config->view('dashboard/cartView' , $order);
	}

	public function update($quantity,$Productprice,$orderPrice,$orderTotalPrice)
	{
		$orderPrice = $quantity * $Productprice;
	}
		
		
}
		
