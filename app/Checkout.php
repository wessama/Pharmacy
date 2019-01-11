<?php

require_once('app/Http/Controllers/Controller.php');

class Checkout
{
	protected $config;

	public function __construct(){

		$this->config = new Controller();

    }
    
    public function store($request)
    {
        $query = $this->config->getInstance();
        
      
        $column="`FullName`,`Email`,`Address`,`City`,`State`,`Zip`,`NameOnCard`,`CreditCardNumber`,`ExpMonth`,`ExpYear`,`CVV`";
        $values="";

        

        foreach ($request as $key => $value) {
            $values .= "'".$request[$key]."',";
        }
        $values = substr ( $values , 0 , strlen($values)-6 );

        // echo $column;
        // echo "<br>";
         echo $values;
         echo "<br>";
        
          $query->query("INSERT INTO `checkout`($column) VALUES ($values)");
    }

	
	
	

}

?>