<?php
	function redirect_to($location)
	{
		header("Location: {$location}");
	}

	function is_admin(){
		session_start();
		if($_SESSION['access_level'] != ADMIN){
			redirect_to("../index.php");
		}
	}

	function is_normal_user(){
		session_start();
		if($_SESSION['access_level'] != USER){
			redirect_to("../index.php");
		}
	}
?>