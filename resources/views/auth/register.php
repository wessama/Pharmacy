<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create an account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	body
	{
		padding: 50px 50px 50px 50px;
		border: 10px solid blue;
		margin: auto;
		width: 60%;
		/* text-align: center; */
	}
</style>
</head>

	<body>
		<div class="container">
			<h1>Registeration</h1>
			<form action="../Pharmacy/register/save" method="POST">

				<div class="form-group">
					<div class="col-xs-2">
						<label for="firstname">First Name:</label>
						<input type="text" class="form-control" id="firstname" placeholder="Enter First name" name="firstname" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-2">
						<label for="lastname">Last Name:</label>
						<input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="lastname" required>
					</div>
				</div>
				<br><br><br><br>

				<div class="form-group">
					<div class="col-sm-5">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
					</div>
				</div>

				<br><br><br>
				<div class="form-group">
					<div class="col-sm-5">
						<label  for="pwd">Password:</label>
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
						<span class="help-block">Use 8 or more characters with a mix of letters, numbers & symbols</span>
					</div>
				</div>

				<br><br><br><br><br><br>
				<div class="form-group">
					<div class="col-sm-5">
						<label for="gender">Gender:</label><br>
						<label class="radio-inline">
							<input type="radio" value="1" name="gender" >Male
						</label>
						<label class="radio-inline">
							<input type="radio" value="2" name="gender">Female
						</label>
					</div>
				</div>

				<br><br><br>
				<!--
				<div class="form-group">
					<div class="col-sm-5">
						<label  for="dof">Date of Birth:</label>
						<input type="date" class="form-control" id="dof" name="dof" min="1999-31-12" required>
						<span class="help-block">Your age must be 18 or above to register</span>
					</div>
				</div>
				-->
				<br><br><br>
				<div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label><input type="checkbox" name="remember"> Remember me</label>
						</div>
					</div>
				</div>

				<div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
		</div>

	</body>
	</html>
