<?php

include 'database.php';

if(isset($_POST['submit'])){
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$message = mysqli_real_escape_string($con, $_POST['message']);
	
	//Set timezone
	date_default_timezone_set('Canada/Mountain');
	$time = date('h:1:s a', time());
	
	//Validate input
	/*
	if(!isset($user) || $user == '' || !isset($message) || $message == '')
	{
		//echo 'bad';
		$errorname = "Please fill in message";
		$errormessage = "please fill in your name";
		header("Location: index.php?error=".urlencode($errorname));
		header("Location: index.php?error=".urlencode($errormessage));
		exit();
		
	}else
	{
		$query = "INSERT INTO shouts(user, message, time)
		         VALUES ('$user', '$message', '$time')";
		
		if(!mysqli_query($con, $query)){
			die('Error: '.mysqli_error($con));
		
		}else{
			header("Location: index.php");
			exit();		
		}
	}*/

	if(!isset($user) || $user == '')
	{
		$errorname = "Please fill in your name";
		header("Location: index.php?error=".urlencode($errorname));
		exit();
	}
	else if(!isset($message) || $message == '')
	{
		$errormessage = "Please fill in your message";
		header("Location: index.php?error=".urlencode($errormessage));
		exit();
	}
	
	else
	{
		$query = "INSERT INTO shouts(user, message, time) VALUES ('$user', '$message' , '$time')";
		
		if(!mysqli_query($con, $query))
		{
			die('Error: '.mysqli_error($con));
			
		}
		else
		{
			header("Location: index.php");
			exit();
		}
	}
	
}







?>