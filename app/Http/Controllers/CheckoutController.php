<?php

require_once('app/Http/Controllers/Controller.php');
require('app/Checkout.php');
class CheckoutController
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

		$this->config->view('dashboard/checkoutView');
	}
	public function store($request)
	{
		if(!isset($_SESSION['user']))
		{
			$this->config->route('Pharmacy/login');
		}
		$checkout = new Checkout();

		$checkout->store($request);
		$this->config->view('dashboard/checkoutView');
	}

}