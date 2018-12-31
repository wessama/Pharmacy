<?php

require_once('app/Http/Controllers/Controller.php');

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

}