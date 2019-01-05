<?php

require_once('app/Http/Controllers/Controller.php');

class User
{
	protected $config;

	public function __construct(){
		
		$this->config = new Controller();
	}

	public function getInfo($email)
	{
		$User = $this->config->getInstance();

		$query = $User->query("SELECT * FROM `user` WHERE `email` = '$email'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getUserInfoById($id)
	{
		$User = $this->config->getInstance();
		$query = $User->query("SELECT * FROM gender INNER JOIN user ON gender.id=user.gender_id WHERE user.id = '$id'");
		var_dump($query);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function get_order_product_details($id)
	{
		$User = $this->config->getInstance();
		$query = $User->query("SELECT * FROM `order`INNER JOIN `product` INNER JOIN `user` ON 
		order.product_id=product.id
		&& 
		order.user_id = user.id
		WHERE user.id =  '$id'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAllInfo($id)
	{
		$User = $this->config->getInstance();
		$query = $User->query("SELECT * 
								FROM `order`o 
								INNER JOIN `product`p 
								INNER JOIN `user` u 
								INNER JOIN `gender` g
								INNER JOIN `category` c 
								INNER JOIN `status` s 
								ON 
								( 
									(u.id = o.user_id ) AND 
									(g.id = u.gender_id ) AND 
									(p.id = o.product_id) AND 
									(s.id = o.status_id ) AND 
									(c.id= p.category_id)
								) 
								WHERE u.id = '$id'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function store($request)
	{
		$User = $this->config->getInstance();
		$firstname = $request['firstname'];
		$email = $request['email'];
		$password = password_hash($request['pwd'], PASSWORD_DEFAULT);
		$gender = $request['gender'];
		//standard query builder
		$User->query("INSERT INTO `user`(`name`, `email`, `password`, `gender_id`, `role_id`) VALUES ('$firstname', '$email', '$password', '$gender', 3)");
	}

}