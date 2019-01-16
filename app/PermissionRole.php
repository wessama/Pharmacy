<?php

require_once('app/Http/Controllers/Controller.php');


class PermissionRole{

	protected $config;

	public function __construct(){

		$this->config = new Controller();

    }

	public function check_permission($permission_id, $role_id){

		$PermissionRole = $this->config->getInstance();

		$query = $PermissionRole->query("SELECT * FROM `permission_role` WHERE `permission_id` = '$permission_id' AND `role_id` = '$role_id'");

		$query->fetchAll(PDO::FETCH_ASSOC);

		if($query == NULL){
			return false;
		}else{
			return true;
		}

	}
	
	public function get_role_permissions_id($role_id){
		
		$PermissionRole = $this->config->getInstance();
		
		$query = $PermissionRole->query("SELECT * FROM `permission_role` WHERE `role_id` = '$role_id'");
		
		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}
}