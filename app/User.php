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
	
	public function getUserInfo($id)
	{
		$User = $this->config->getInstance();
		$query = $User->query("SELECT * FROM gender INNER JOIN user ON gender.id=user.gender_id WHERE user.id = '$id'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	//user Table
	public function getUserTable($id)
	{
		$User = $this->config->getInstance();
		$query = $User->query("SELECT o.id , p.product_name , p.quantity , p.price , c.category , o.`created-at`
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
								WHERE u.id = '$id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	//pharmacist Table
	public function getPharmacistTable($id)
	{
		$User = $this->config->getInstance();
		
		$query = $User->query("SELECT u.id, u.name , u.email ,o.id , o.`created-at` , s.status_name 
								FROM `order`o 
								INNER JOIN `user`u 
								INNER JOIN `status`s 
								ON o.user_id = u.id AND
								o.status_id = s.statusId
								WHERE u.role_id =3");
		
										
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