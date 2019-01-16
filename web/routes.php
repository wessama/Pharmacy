<?php

$config = new Controller();

$GLOBALS['ASSET'] = "../../../Pharmacy/";

$GLOBALS['home'] = "home";

$GLOBALS['logout'] = "logout";

$GLOBALS['cart'] = "cart";

$GLOBALS['product'] = "products";

$GLOBALS['profile'] = "profile";

$GLOBALS['orderHistory'] = "orders";

$GLOBALS['Billing'] = "billing";

$GLOBALS['addProduct'] = "Product/add";

$GLOBALS['addNewProduct'] = "admin/product/add";

$GLOBALS['submitProduct'] = "admin/product/add/submit";

$GLOBALS['removeFromCart'] = "cart/remove";

$GLOBALS['inventoryRequest'] = "admin/request/add";

$GLOBALS['UserInformation'] = "admin/users";

$GLOBALS['inventory'] = "admin/inventory";

$GLOBALS['viewAllOrders'] = "admin/orders";



/* Main routes */
if($_SERVER['REQUEST_URI'] == '/Pharmacy/')
{
	$config->route('Pharmacy/home');
}

if(strpos($_SERVER['REQUEST_URI'], "admin") !== false){

	if(!in_array("can_view_admin_panel", $_SESSION['permissions']))
	{
		$_SESSION['not_permitted'] = true;

		$config->route('../Pharmacy/home');
	}
}

/** Functional routes **/

if($_SERVER['REQUEST_URI'] == '/Pharmacy/home')
{
	$config->getController('HomeController');

	$HomeController = new HomeController();
	
	if(isset($_POST['searchText']))
	{
		$request = $_POST['searchText'];
		$HomeController->homePageSearch($request);	
	}
	else{
		$HomeController->index();

		if(isset($_SESSION['not_permitted']))
		{
			unset($_SESSION['not_permitted']);
		}

	}
}
else if(strpos($_SERVER['REQUEST_URI'], "/Pharmacy/products") !== false)
{
	$config->getController('ProductController');
	
	$ProductController = new ProductController();
	
	if(isset($_GET['category']))
	{
		$categoryid = $_GET['category'];
	}
	else{
		$categoryid = 1;
	}

	if(isset($_POST['searchText']))
	{
		$searchtext = $_POST['searchText'];
		$ProductController->productSearch($searchtext,$categoryid);
	}
	else{
		$ProductController->index($categoryid);
	}
}
else if(strpos($_SERVER['REQUEST_URI'], "/Pharmacy/profile") !== false)
{
	$request = $_POST;
	
	$config->getController('UserController');
	
	$UserController = new UserController();
	
	$UserController->index();	
}
else if($_SERVER['REQUEST_URI'] == "/Pharmacy/orders")
{
	$config->getController('OrderHistoryController');
	
	$OrderHistoryController = new OrderHistoryController();
	
	$OrderHistoryController->index();	
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
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/billing/submit')
{
	$request = $_POST;

	$config->getController('BillingController');
	
	$BillingController = new BillingController();
	
	$BillingController->store($request);
		
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
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/cart')
{
	$config->getController('CartController');

 	$cartController = new CartController();

	$cartController->addToCart();
	  
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/billing')
{
	$config->getController('BillingController');

 	$BillingController = new BillingController();

 	$BillingController->index();
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/Product/add')
{
	$request = $_POST;
	
	if(isset($_SESSION['cart_empty_alert'])){
		unset($_SESSION['cart_empty_alert']);
	}
	
	$_SESSION['cartProducts'][] = $request['product_id'];

	$_SESSION['product_added_to_cart'] = true;
	
	$config->route('products'.'?category='.$_POST['category_id']);
	
}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/admin/product/add'){

	$config->getController('AdminController');

 	$AdminController = new AdminController();

	$AdminController->addNewProduct();

}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/admin/product/add/submit'){

	$request = $_POST;

	$config->getController('AdminController');

 	$AdminController = new AdminController();

	$AdminController->storeNewProduct($request);

}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/cart/remove'){

	$request = $_POST;

	$config->getController('CartController');

 	$CartController = new CartController();

	$CartController->removeFromCart($request);

}
else if($_SERVER['REQUEST_URI'] == '/Pharmacy/admin/request/add')
{
	$request = $_POST;

	$config->getController('RequestController');
	
	$RequestController = new RequestController();
	
	$RequestController->store($request);
	
}
/* Admin routes */
else if($_SERVER['REQUEST_URI'] == "/Pharmacy/admin/users")
{
	$config->getController('AdminController');
	
	$AdminController = new AdminController();
	
	$AdminController->viewAllUsers();	
}
else if($_SERVER['REQUEST_URI'] == "/Pharmacy/admin/inventory")
{
	$config->getController('AdminController');
	
	$AdminController = new AdminController();
	
	$AdminController->viewInventory();	
}
else if($_SERVER['REQUEST_URI'] == "/Pharmacy/admin/orders")
{
	$config->getController('AdminController');
	
	$AdminController = new AdminController();
	
	$AdminController->viewAllOrders();	
}
else if($_SERVER['REQUEST_URI'] == "/Pharmacy/admin/user/edit_role")
{
	$request = $_POST;

	$config->getController('AdminController');
	
	$AdminController = new AdminController();
	
	$AdminController->editUserRole($request);	
}
else if($_SERVER['REQUEST_URI'] == "/Pharmacy/admin/order/edit_status")
{
	$request = $_POST;

	$config->getController('AdminController');
	
	$AdminController = new AdminController();
	
	$AdminController->editOrderStatus($request);	
}

