<?php

require_once('app/Http/Controllers/Controller.php');

class Request
{
	protected $config;

	public function __construct(){

		$this->config = new Controller();

	}


	public function store($request)
	{
		$product_id = $request['product_id'];

		$Request = $this->config->getInstance();

		$query = $Request->query("INSERT INTO `request`(`product_id`) VALUES ('$product_id')");
	}

}