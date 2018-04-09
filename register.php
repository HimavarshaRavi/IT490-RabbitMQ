<?php


error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);


$username = $_POST["user"];
$password = $_POST["pass"];
$name = $_POST["text"];
$email = $_POST["email"];



$host = "localhost";
$user = "mk694";
$pass = "testmk694";
$dbname = "userlogin";

$con = mysqli_connect($host, $user, $pass, $dbname);

	
	$newUser = mysqli_query($con, "INSERT INTO user(Username, Password, Name, Email) VALUES('$username', '$password', '$name', '$email')");
	
	if($con->query($newUser) == FALSE) {
		echo "Congratulations, You are now a member!";
			header ("refresh: 2; 'http://10.0.1.8/blog.html'");
	}else {
		echo "Could not create record";
		header ("refresh: 2; 'http://10.0.1.8/register.html'");
	}


?>
