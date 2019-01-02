<?php

require_once('app/Http/Controllers/Controller.php');

class Product
{
	protected $config;

	public function __construct(){

		$this->config = new Controller();

	}

	public function getProducts($category_id){

		$product =$this->config->getInstance();

		$query = $product->query("SELECT * FROM `product` WHERE `category_id` = '$category_id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);

	}
	
	public function searchProducts($searchString)
	{
		$DBConnectionInstance =$this->config->getInstance();
		$columnName = "product_name	";
		$tableName = "product";
		
		$query = $this->config->getSearchResults($DBConnectionInstance , $tableName , $columnName , $searchString); 
		if (!is_null($query)) {
			return $query;
		} else {
			return (new Product)->getProducts($category_id);
		}
   }

}

?>