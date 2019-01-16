<?php

require_once('app/Http/Controllers/Controller.php');

require('app/Category.php');
require('app/User.php');
require('app/Order.php');
require('app/Status.php');

class AdminController
{

	private $config;
	
	public function __construct()
	{
		$this->config = new Controller();
	}

	public function addNewProduct()
	{
		if(!isset($_SESSION['user']) || ($_SESSION['user_role'] == 3))
		{
			$_SESSION['not_permitted'] = true;

			$this->config->route('home');
		}

		$category = new Category();

		$categories = $category->getCategories();

		$this->config->view('admin/add-new-product', $categories);
	}

	public function storeNewProduct($request)
	{

		$Product = new Product();

		$Product->store($request);
		
		$_SESSION['product_successfully_addded'] = true;

		$this->config->route('../../admin/product/add');		
	}

	public function viewInventory()
	{

		if(!isset($_SESSION['user']) || ($_SESSION['user_role'] == 3))
		{
			$_SESSION['not_permitted'] = true;

			$this->config->route('home');
		}

		$user_id = $_SESSION['userid'];

		$Product = new Product();

		$query = $Product->getProductInventory();

		$tableData = array("Product number","Product Name", "Product Category", "Product Quantity");

		$data = array($tableData, $query);

		$this->config->view('admin/view-inventory', $data);	
	}

	public function viewAllOrders()
	{
		if(!isset($_SESSION['user']) || ($_SESSION['user_role'] == 3))
		{
			$_SESSION['not_permitted'] = true;

			$this->config->route('home');
		}

		$Order = new Order();

		$Status = new Status();

		$query = $Order->getAllOrders();

		$StatusData = $Status->getAllStatusCodes();

		$tableData = array("Order Number" , "User Name" ,"Product Name" , "Order Quantity" , "Product Category" , "Date" , "Status", "Process");

		$data = array($tableData, $query, $StatusData);

		$this->config->view('admin/view-all-orders', $data);	
	}

	public function viewAllUsers()
	{

		if(!isset($_SESSION['user']) || ($_SESSION['user_role'] == 3))
		{
			$_SESSION['not_permitted'] = true;

			$this->config->route('home');
		}

		$id = $_SESSION['userid'];
		
		$User = new User();

		$Role = new Role();

		$roleData = $Role->getAllRoles();

		$query = $User->getAllUsers();

		$tableData = array("User Number", "User Name", "Email", "Role");

		$data = array($tableData, $query, $roleData);

		$this->config->view('admin/view-all-users' , $data);	
	}

	public function editUserRole($request)
	{
		$user_id = $request['user_id'];
		$role_id = $request['role_id'];

		$User = new User();

		$User->updateRole($user_id, $role_id);

	}

	public function editOrderStatus($request)
	{
		$status_id = $request['status_id'];
		$order_id = $request['order_id'];

		$Order = new Order();

		$Order->updateStatus($order_id, $status_id);
	}

}