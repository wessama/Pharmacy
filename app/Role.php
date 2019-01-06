<?php

require_once('app/Http/Controllers/Controller.php');

class Role
{
	protected $config;

	public function __construct(){
		$this->config = new Controller();
	}

	public function getUserTypeName($userId)
	{
		$role = $this->config->getInstance();
		$query = $role->query("SELECT `displayName` 
								FROM `role` 
								INNER JOIN `user` 
								ON role.id = user.role_id
								WHERE user.id ='$userId'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getUserTypeNumber($userId)
	{
		$role = $this->config->getInstance();
		$query = $role->query("SELECT `role_id` FROM `user` WHERE `id`='$userId'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

}

?>