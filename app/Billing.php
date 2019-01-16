<?php

require_once('app/Http/Controllers/Controller.php');

class Billing
{
	protected $config;

	public function __construct(){

		$this->config = new Controller();

    }
    
    public function store($request)
    {
        $query = $this->config->getInstance();
        
        $column="`user_id`,`Address`,`City`,`Zip`,`NameOnCard`,`CreditCardNumber`,`ExpMonth`,`ExpYear`,`CVV`";
        $values="";

        foreach ($request as $key => $value) {
            $values .= "'".$request[$key]."',";
        }
		
		$user_id = $_SESSION['userid'];
        
        $values = substr($values , 0, strlen($values)-1);
		
        $sql = $query->query("INSERT INTO `billing`($column) VALUES ('$user_id',$values)");
    }
	
	public function getLastId(){
		
		$SQL = $this->config->getInstance();
		
		$query = $SQL->query("SELECT `id` FROM `billing` ORDER BY `id` DESC LIMIT 1");
		
		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}

	
	
	

}

?>