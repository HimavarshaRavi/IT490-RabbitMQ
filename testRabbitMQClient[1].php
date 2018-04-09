#!/usr/bin/php

<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);



require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//include('ftp://10.0.1.6/con.php?function=getCredentials()');

//include $_SERVER['http://10.0.1.6']."con.php";

//getCredentials();



$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{

$un = $_POST['user'];
$_SESSION["username"] = $un;
$ps = $_POST['pass'];
$_SESSION["password"] = $ps;

        //DB admin
        $host = "10.0.1.6";
        $dbus = "mk694";
        $dbps = "testmk694";
        $dbss = "userlogin";

        //DB connection & query
        $conn = mysqli_connect($host, $dbus, $dbps, $dbss);
        $query = mysqli_query($conn, "SELECT * from user WHERE Username = '$un' && Password='$ps'");

        // check CREDENTIALS
        $rows = mysqli_num_rows($query);

        if($rows == 1){
                echo"LOADING....";
                $_SESSION["type"] = "Login";
                $_SESSION["message"] = "Access";
                 }

        else{
                echo"Loading...";
                $_SESSION["type"] = "validate_session";
                $_SESSION["message"] = "Deny";
                 }



	$user = $_SESSION["username"];
	$pass = $_SESSION["password"];
	$type = $_SESSION["type"];  
	$msg = $_SESSION["message"];
	echo $user;
}


$request = array();
$request['type'] = $type;
$request['username'] = $user;
$request['password'] = $pass;
$request['message'] = $msg;
$request['sessionId'] = $type;


$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);


//echo $argv[0]." END".PHP_EOL;


if($request['message'] == "Access"){ header("refresh:1; url = 'http://api2.bigoven.com'"); }

if($request['message'] == "Deny"){ header("refresh:1; url = 'http://10.0.1.8/register.html'"); }

exit();

i?>
