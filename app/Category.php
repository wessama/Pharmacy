<?php

require_once('app/Http/Controllers/Controller.php');

class Category
{
	protected $config;

	public function __construct(){

		$this->config = new Controller();

	}

	public function getCategories(){

		 $query = $this->config->getInstance();

		 $data = $query->query("SELECT * FROM `category`");

		 return $data->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function searchCategories($searchString){

		 $DBConnectionInstance =$this->config->getInstance();
		 $columnName = "category";
		 $tableName = "category";

		 $query = $this->config->getSearchResults($DBConnectionInstance , $tableName , $columnName , $searchString); 
		 if (!is_null($query)) {
			 return $query;
		 } else {
			 
			 return (new Category)->getCategories();
		 }
	}

}

?>