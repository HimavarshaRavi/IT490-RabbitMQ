#!/usr/bin/php
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$sessionId)
{

	//header("refresh:3;'http://10.0.1.6/con.php'");

    // lookup username in database
	//if($sessionId == "Login"){
	//echo "Hello $username...";
	//header("refresh:1; url = 'http://api2.bigoven.com'");	 }


return true;
}

	
function doValidate($sessionId){

	//if($sessionId == "validate_session"){

	echo"Incorrect username or password...";
	//header("refresh:1; url = 'blog.html'");	 }
	//else{echo "$sessionId";}
	return false;
}


function requestProcessor($request)
{
	echo "received request".PHP_EOL;

  	var_dump($request);

  	if(!isset($request['type'])){

		return "ERROR: unsupported message type"; }


	switch ($request['type']){

		case "Login":
      		return doLogin($request['username'],$request['sessionId']);

		case "validate_session":
      		return doValidate($request['sessionId']); }


	return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

echo $request['sessionId'];
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');

exit();

?>

