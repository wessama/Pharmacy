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
	
	public function searchProducts($searchString,$category_id)
	{
		// $DBConnectionInstance =$this->config->getInstance();
		$columnName = "product_name";
		$tableName = "product";
		$product =$this->config->getInstance();
		$query = $product->query("SELECT * FROM `$tableName` WHERE `category_id` = '$category_id' AND `$columnName` LIKE '%$searchString%'");
		if (!is_null($query)) {
			return $query;
		} else {
			return (new Product)->getProducts($category_id);
		}
   }

}

?>