<?php

$config = new Controller();

$GLOBALS['ASSET'] = "../Pharmacy/";

$GLOBALS['home'] = "home";

$GLOBALS['logout'] = "logout";

$GLOBALS['cart'] = "user/cart";

$GLOBALS['product'] = "products";

if($_SERVER['REQUEST_URI'] == '/Pharmacy/home')
{
	$config->getController('HomeController');

	$HomeController = new HomeController();
	
	if(isset($_POST['searchText']))
	{
		$request = $_POST['searchText'];
		$HomeController->homePageSearch($request);	
	}
	else
	{
		$HomeController->index();
	}
}

else if($_SERVER['REQUEST_URI'] == '/Pharmacy/register')
{
	$config->getController('RegisterController');
	
	$RegisterController = new RegisterController();
	
	$RegisterController->index();
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/register/save')
{
	$request = $_POST;
	
	$config->getController('RegisterController');
	
	$RegisterController = new RegisterController();
	
	$RegisterController->store($request);
	
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/login/submit')
{
	$request = $_POST;
	
	$config->getController('LoginController');
	
	$LoginController = new LoginController();
	
	$LoginController->logIn($request);
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/login')
{
	$config->getController('LoginController');
	
	$LoginController = new LoginController();
	
	$LoginController->index();
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/logout')
{
	session_destroy();
	
	$config->route('Pharmacy/home');
	
}
else if(strpos($_SERVER['REQUEST_URI'], "/Pharmacy/products") !== false)
{
	$config->getController('ProductController');
	
	$ProductController = new ProductController();
	
	if(isset($_GET['category']))
	{
		$request = $_GET['category'];
	}
	else
	{
		$request = 1;
	}

	if(isset($_POST['searchText']))
	{
		$request = $_POST['searchText'];
		$ProductController->productSearch($request);
	}
	else{
		$ProductController->index($request);
	}

	

	// $ProductController->index($request);
}

else if($_SERVER['REQUEST_URI'] == '/Pharmacy/cart')
{
	$config->getController('CartController');
 	$cartController = new CartController();
 	$cartController->index();
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/Product/add')
{
	$request=$_POST;
	
	if(!in_array($request['product_id'], $_SESSION['cartProducts']))
	{
		$_SESSION['cartProducts'][] = $request['product_id'];
	}
	else
	{
		echo "<script>alert('Product already exists in cart');</script>";
	}

	$config->route('products');
}
