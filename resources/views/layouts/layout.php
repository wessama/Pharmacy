
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo ucfirst(basename($_SERVER['REQUEST_URI'])); ?></title>
	
    <link rel="icon" href="https://www.upload.ee/image/9428015/favicon.png">

	<link rel="stylesheet" href="public/css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

    <link href="public/css/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="public/css/css/mdb.min.css" rel="stylesheet">
    
    <link href="public/css/css/style.css" rel="stylesheet">
    
	<link href="public/css/css/addons/datatables.min.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<a class="navbar-brand" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['home'] ?>"><img src="https://www.upload.ee/image/9428217/logo.png" width="70" height="70"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['home'] ?>"><i class="fa fa-home"></i> Home<span class="sr-only">(current)</span></a>
				</li>
				<?php if(isset($_SESSION['user'])){ ?>
				<li class="nav-item">
					<a class="nav-link grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['cart'] ?>"><i class="fa fa-shopping-cart"></i> Cart</a>
				</li>
				<?php } ?>
			</ul>
			<ul class="navbar-nav mr-0">
				<?php if(isset($_SESSION['user'])){?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user grow"></i>
							<?php isset($_SESSION['user']) ? print($_SESSION['user']) : print(' Not logged in'); ?>	
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['profile']?>">Profile</a>
							<a class="dropdown-item grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['orderHistory'] ?>">Order history</a>
							<?php if(in_array("can_view_orders", $_SESSION['permissions'])){ ?>	
							<a class="dropdown-item grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['viewAllOrders'] ?>">All orders</a>	
							<?php } ?>
							<?php if(in_array("can_view_users", $_SESSION['permissions'])){ ?>	
							<a class="dropdown-item grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['UserInformation']?>">All users</a>
							<?php } ?>
							<?php if(in_array("can_add_product", $_SESSION['permissions'])){ ?>	
							<a class="dropdown-item grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['addNewProduct'] ?>">Add new product</a>	
							<?php } ?>
							<?php if(in_array("can_view_inventory", $_SESSION['permissions'])){ ?>	
							<a class="dropdown-item grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['inventory'] ?>">Inventory</a>	
							<?php } ?>
							<a class="dropdown-item grow" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['logout'] ?>" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Log out</a>
						</div>
					</li>
				<?php }else{ ?>
					<li class="nav-item">
						<a class="nav-link grow" onclick="document.getElementById('ModalLogin').style.display='block'"><i class="fa fa-sign-in-alt grow"></i> Log in</a>
					</li>
				<?php } ?>
			</ul>
			<form class="form-inline my-2 my-lg-0 "method="post"action="<?php echo  $_SERVER['REQUEST_URI']  ?>">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchText" >
			</form>  
		</div>
	</nav>

	<div class="container">
	<?php include('resources/views/layouts/errors.php'); ?>
	</div>

	<form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['logout'] ?>" id="logout-form" method="POST">

	</form>


