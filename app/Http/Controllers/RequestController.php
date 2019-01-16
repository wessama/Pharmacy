<?php

require_once('app/Http/Controllers/Controller.php');

require('app/Request.php');

class RequestController
{
	private $config;


	public function __construct()
	{

		$this->config = new Controller();
	}


	public function store($request)
	{
		$Request = (new Request)->store($request);

		$_SESSION['request_added'] = true;

		$this->config->route('../admin/inventory');	
	}

}