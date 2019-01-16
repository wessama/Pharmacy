<?php

require_once('app/Http/Controllers/Controller.php');

require('app/Product.php');

class Order
{
	protected $config;

	public function __construct(){
		$this->config = new Controller();
	}
	
	public function store($product_id, $user_id, $billing_id)
	{
		$query = $this->config->getInstance();
        
		$Product = new Product();
		
		$productInfo = $Product->getProductInfo($product_id);

		$Product->adjustQuantity($product_id);
		
		$productPrice = $productInfo[0]['price'];
		
		$query->query("INSERT INTO `order`(`product_id`, `user_id`, `status_id`, `billing_id`, `quantity`, `product_price`) VALUES
		('$product_id', '$user_id', 2, '$billing_id', 1, '$productPrice')");
		
	
	}

	public function getAllOrders()
	{
		$order = $this->config->getInstance();
		//Order Number , User Name ,Product Name , Order Quantity , Product Category , Date , Status
		$query = $order->query("SELECT o.id , u.name ,p.product_name , o.quantity , c.category , o.`created-at` , s.`status_name`
								FROM `order`o 
								INNER JOIN  `user` u 
								INNER JOIN `product`p 
								INNER JOIN `category` c 
								INNER JOIN `status` s 
								ON 
								( 
									(u.id = o.user_id)    AND 
									(p.id = o.product_id) AND 
									(s.statusId = o.status_id)  AND
									(c.id = p.category_id)
								) ORDER BY o.id ASC ");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPreviousOrders($user_id)
	{
		$User = $this->config->getInstance();
		
		$query = $User->query("SELECT o.id , p.product_name , o.quantity , p.price , c.category , o.`created-at`
								FROM `order`o 
								INNER JOIN  `user` u 
								INNER JOIN `product`p 
								INNER JOIN `gender` g
								INNER JOIN `category` c 
								INNER JOIN `status` s 
								ON 
								( 
									(u.id = o.user_id)    AND 
									(g.id = u.gender_id)  AND 
									(p.id = o.product_id) AND 
									(s.statusId = o.status_id)  AND
									(c.id = p.category_id)
								) 
								WHERE u.id = '$user_id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function updateStatus($order_id, $status_id)
	{
		$Order = $this->config->getInstance();

		$query = $Order->query("UPDATE `order` SET `status_id` = '$status_id' WHERE `id` = '$order_id'");
	}
	
}