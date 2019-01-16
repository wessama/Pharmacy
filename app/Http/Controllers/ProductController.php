<?php

require_once('app/Http/Controllers/Controller.php');

require('app/Product.php');

class productController
{
	private $config;


	public function __construct()
	{

		$this->config = new Controller();
	}

	public function index($request)
	{

		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}

		$product = new Product();

		$products = $product->getProducts($request);

		$this->config->view('dashboard/product-view', $products);
	}
	
	public function productSearch($searchString, $categoryid)
	{
		$Product = new Product();

		$products = $Product->searchProducts($searchString,$categoryid);

		$this->config->view('dashboard/product-view', $products);
	}
}