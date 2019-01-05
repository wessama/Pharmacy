
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="public/css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../public/css/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../public/css/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../public/css/css/style.css" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
  <link href="../public/css/css/addons/datatables.min.css" rel="stylesheet">
</head>
<body background="public/images/wallpaper2.jpg">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="C:\Pharmacy\resources\views\home.php">Pharmacy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['home'] ?>">Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['cart'] ?>">Cart</a>
				</li>
			</ul>
			<ul class="navbar-nav mr-0">
				<?php if(isset($_SESSION['user'])){ ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php isset($_SESSION['user']) ? print($_SESSION['user']) : print('Not logged in'); ?>	
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['profile']?>">Profile</a>
							<a class="dropdown-item" href="#">Settings</a>
							<a class="dropdown-item" href="<?php echo $GLOBALS['ASSET'].$GLOBALS['logout'] ?>" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Log out</a>
						</div>
					</li>
				<?php }else{ ?>
					<li class="nav-item">
						<a class="nav-link" onclick="document.getElementById('ModalLogin').style.display='block'">Log in</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register">Register</a>
					</li>
				<?php } ?>
			</ul>
			<form class="form-inline my-2 my-lg-0 "method="post"action="<?php echo  $_SERVER['REQUEST_URI']  ?>">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchText" >
			</form>  
		</div>
	</nav>


	<form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['logout'] ?>" id="logout-form" method="POST">

	</form>


