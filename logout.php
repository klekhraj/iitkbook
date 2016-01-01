<?php
	session_start();
	session_destroy();
	if(isset($_COOKIE)){
		$user = $_COOKIE['user'];
		setcookie('user',$user,1);
		echo "You are Successfully Logged out!";
		echo "Log in again <a href='index.php'>here</a>.";
	}
?>
