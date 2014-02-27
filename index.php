<?php
	session_start();
	if (!isset($_SESSION['Twitter_Access_Token']) || !isset($_SESSION['Twitter_Access_Token_Secret'])) {
			echo "<a href='login.php'>Click Here to sign in with Twitter</a>";
	} 
	else {
		include "display.html";
	}
?>