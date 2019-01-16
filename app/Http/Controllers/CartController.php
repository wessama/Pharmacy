<?php

require_once('app/Http/Controllers/Controller.php');
require('app/Cart.php');
require('app/Product.php');


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

		$this->config->view('dashboard/cart');
	}
	public function addToCart()
	{
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}
		

		if(isset($_SESSION['cartProducts'])){

			$Product = new Product();

			$data['cartProducts'] = [];

			foreach($_SESSION['cartProducts'] as $productID){
				$data['cartProducts'][] = $Product->getProductInfo($productID);
			}

			$data['total'] = 0;

			foreach($data['cartProducts'] as $product){
				$data['total'] += $product[0]['price'];
			}

			$this->config->view('dashboard/cart' , $data);

		}else{
			$_SESSION['cart_empty_alert'] = true;
			
			$this->config->view('dashboard/cart');
		}


	}
	

	public function removeFromCart($request){

		if (($key = array_search($request['cartItem'], $_SESSION['cartProducts'])) !== false) {
			unset($_SESSION['cartProducts'][$key]);
		}

		$_SESSION['cart_item_removed'] = true;

		$this->config->route('cart');
	}


}

