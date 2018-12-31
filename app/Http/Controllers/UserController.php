<?php


require('app/dependencies/PDOConnection.php');
require('app/User.php');


class UserController
{
	public function index()
	{
		header('Location: ../resources/views/home.php');
	}
}
