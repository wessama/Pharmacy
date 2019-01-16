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
		$columnName = "product_name";

		$tableName = "product";

		$product =$this->config->getInstance();

		$query = $product->query("SELECT * FROM `$tableName` WHERE `category_id` = '$category_id' AND `$columnName` LIKE '%$searchString%'");

		if (!is_null($query)) {

			return $query;

		}else{
			return (new Product)->getProducts($category_id);
		}
   }
   
   public function getProductInfo($id){
	   
	   $Product = $this->config->getInstance();
	   
	   $query = $Product->query("SELECT * FROM `product` WHERE `id` = '$id'");
	   
	   $data = $query->fetchAll(PDO::FETCH_ASSOC);
	   
	   return $data;
	   
   }

   public function getProductInventory()
   {
	   
	   $Product = $this->config->getInstance();
	   
	   $query = $Product->query("SELECT p.id, p.Product_Name  , c.Category , p.Quantity 
								   FROM `product`p
								   INNER JOIN `category`c
								   ON p.category_id = c.id");
	   
	   return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   public function store($request)
   {
   		$Product = $this->config->getInstance();

   		$category_id = filter_var($request['category_id'], FILTER_SANITIZE_NUMBER_INT);
   		$product_name = filter_var($request['product_name'], FILTER_SANITIZE_STRING);
   		$quantity = filter_var($request['quantity'], FILTER_SANITIZE_NUMBER_INT);
   		$price = filter_var($request['price'], FILTER_SANITIZE_NUMBER_INT);
   		$description = filter_var($request['Product_description'], FILTER_SANITIZE_STRING);

   		$query = $Product->query("
   			INSERT INTO `product`
   			(`category_id`, 
   			`product_name`,  
   			`quantity`, 
   			`price`, 
   			`Product_description`) 
   			VALUES 
   			('$category_id',
   			'$product_name',
   			'$quantity',
   			'$price',
   			'$description'
   			)");
   }

   public function adjustQuantity($product_id)
   {

   		$Product = $this->config->getInstance();

   		$query = $Product->query("UPDATE `product` SET `quantity` = `quantity` - 1 WHERE `id` = '$product_id'");

   }

}

?>