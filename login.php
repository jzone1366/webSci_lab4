<?php 
	session_start();
	
	require_once "includes/config.php";
	require_once "twitteroauth/twitteroauth.php";

	$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
	$request_token = $connection->getRequestToken($OAUTH_CALLBACK);
	$_SESSION['Twitter_Request_Token'] = $token = $request_token['oauth_token'];
	$_SESSION['Twitter_Request_Token_Secret'] = $request_token['oauth_token_secret'];

	$authenticateURL = $connection->getAuthorizeURL($token);
	header("location: " . $authenticateURL);
	exit;
?>