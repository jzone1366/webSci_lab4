<?php
	require_once "includes/config.php";
	session_start();

	require_once "twitteroauth/twitteroauth.php";


	$twitteruser = "jzone1366";

	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}

	$connection = getConnectionWithAccessToken($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_SECRET);

	$profile = $connection->get("https://api.twitter.com/1.1/users/show.json?screen_name=".$twitteruser);

	echo json_encode($profile);
?>