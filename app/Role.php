<?php

require_once('app/Http/Controllers/Controller.php');

class Role
{
	protected $config;

	public function __construct(){
		$this->config = new Controller();
	}

	public function getUserRole($user_id)
	{
		$role = $this->config->getInstance();
		
		$query = $role->query("SELECT `displayName` 
								FROM `role` 
								INNER JOIN `user` 
								ON role.id = user.role_id
								WHERE user.id ='$user_id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllRoles()
	{
		$Role = $this->config->getInstance();

		$query = $Role->query("SELECT * FROM `role`");

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

}

?>