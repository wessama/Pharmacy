<?php

require_once('app/Http/Controllers/Controller.php');

class Cart
{
	protected $config;

	public function __construct(){

		$this->config = new Controller();

	}

	public function placeOrderInfo($request){

	
		
		$arrayOfIds = "".$request[0];

        $cart = $this->config->getInstance();
        
         for ($i=1; $i <sizeof($request)-1 ; $i++) { 
			$arrayOfIds .= ','.$request[$i];
		 }
		 
		 
		 $query = $cart->query("SELECT o.`orderPrice` ,o.`orderTotalPrice` ,o.`quantity` 
		 							  ,p.price ,p.product_name ,p.Product_description , p.product_image
									   FROM `order` o 
									   INNER JOIN `product`p 
									   WHERE o.`product_id` 
									   IN ('$arrayOfIds')");

		return $query->fetchAll(PDO::FETCH_ASSOC);
			
	}
	
	
	
}

?>