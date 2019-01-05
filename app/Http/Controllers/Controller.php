<?php


require('app/dependencies/PDOConnection.php');

class Controller
{

	public function getInstance()
	{
		$instance = new DB_Connect();

		return $instance;
	}

	public function getController($controllerName)
	{
		include('app/Http/Controllers/'.$controllerName.".php");
	}

	public function view($path, $data = array())
	{
		include('resources/views/'.$path.".php");
	}
	public function view1($path, $data = array() ,$data1 = array())
	{
		include('resources/views/'.$path.".php");
	}

	public function route($routeName)
	{
		header('Location: ../'.$routeName);
	}

	public function getUserTypeName($user_id)
	{
		$User = new User();
		$query = $User->query("SELECT `displayName` 
								FROM `role` INNER JOIN `user` 
								ON role.id = user.role_id
								WHERE user.id ='$user_id'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getUserTypeNumber($user_id)
	{
		$User = new User();
		$query = $User->query("SELECT `role_id` FROM `user` WHERE `id`='$user_id'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getSearchResults($DBobject,$tableName , $columnName , $searchString)
	{
		// $DBobject =$this->config->getInstance();

		$query = $DBobject->query("SELECT * FROM `$tableName` WHERE `$columnName` LIKE '%$searchString%'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}

}


