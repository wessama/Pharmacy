<?php

require_once('app/Http/Controllers/Controller.php');

class Permission{

	protected $config;

	public function __construct(){

		$this->config = new Controller();

    }

	public function get_permission($permission){

		$permission = $this->config->getInstance();

		$query = $permission->query("SELECT * FROM `permission` WHERE `permission` = '$permission'");

		$query->fetchAll(PDO::FETCH_ASSOC);

	}
	
	public function get_permission_by_id($data){
		
		$permission_id = $data['permission_id'];

		$permission = $this->config->getInstance();
		
		$query = $permission->query("SELECT * FROM `permission` WHERE `id` = '$permission_id'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}


}