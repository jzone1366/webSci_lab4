<?php 
	require_once "../../includes/config.php";
	session_start();

	require_once "../../twitteroauth/twitteroauth.php";

	$twitteruser = $_SESSION['Twitter_User_Id'];
	$notweets = 100;

	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
	
	$connection = getConnectionWithAccessToken($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['Twitter_Access_Token'], $_SESSION['Twitter_Access_Token_Secret']);

	$tweets = $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

	echo json_encode($tweets);
?>