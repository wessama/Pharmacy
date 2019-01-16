<?php

require_once('app/Http/Controllers/Controller.php');

require('app/Category.php');

class HomeController
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

		$category = new Category();

		$data['categories'] = $category->getCategories();

		$this->config->view('home', $data);
	}

	public function homePageSearch($searchString)
	{
		$category = new Category();
		
		$data['categories']= $category->searchCategories($searchString);
		
		$this->config->view('home', $data);
	}

}