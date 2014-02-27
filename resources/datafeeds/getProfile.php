<?php
	require_once "../../includes/config.php";
	session_start();

	require_once "../../twitteroauth/twitteroauth.php";

	$twitteruser = $_SESSION['Twitter_User_Id'];

	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}

	$connection = getConnectionWithAccessToken($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['Twitter_Access_Token'], $_SESSION['Twitter_Access_Token_Secret']);

	$profile = $connection->get("https://api.twitter.com/1.1/users/show.json?screen_name=".$twitteruser);

	echo json_encode($profile);
?>