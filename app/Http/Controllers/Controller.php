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

	public function route($routeName)
	{
		header('Location: ../'.$routeName);
	}

	public function getUserType($user_id)
	{
		//
	}

	public function getSearchResults($DBobject,$tableName , $columnName , $searchString)
	{
		// $DBobject =$this->config->getInstance();

		$query = $DBobject->query("SELECT * FROM `$tableName` WHERE `$columnName` LIKE '%$searchString%'");

		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}

}


