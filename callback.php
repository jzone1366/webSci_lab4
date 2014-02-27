<?php
	session_start();
	require_once "includes/config.php";
	require_once "twitteroauth/twitteroauth.php";

	$accessURL = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['Twitter_Request_Token'], $_SESSION['Twitter_Request_Token_Secret']);
	$accessToken = $accessURL->getAccessToken($_REQUEST['oauth_verifier']);

	$_SESSION['Twitter_Access_Token'] = $accessToken['oauth_token'];
	$_SESSION['Twitter_Access_Token_Secret'] = $accessToken['oauth_token_secret'];
	$_SESSION['Twitter_User_Id'] = $accessToken['screen_name'];

	header('Location: index.php');
	?>