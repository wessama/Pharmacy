<?php

require_once('app/Http/Controllers/Controller.php');

class Status
{
	protected $config;

	public function __construct(){
		$this->config = new Controller();
	}

	public function getAllStatusCodes()
	{
		$Status = $this->config->getInstance();

		$query = $Status->query("SELECT * FROM `status`");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}


}