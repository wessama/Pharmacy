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

		$categories = $category->getCategories();

		$this->config->view('home', $categories);
	}

	public function homePageSearch($searchString)
	{
		$category = new Category();





		
		$categories = $category->searchCategories($searchString);
		var_dump($categories);
		$this->config->view('home', $categories);
	}

}