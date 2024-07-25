<?php
session_start();
	if (isset($_SESSION["loggedin"])) {
		unset($_SESSION["loggedin"]); 
	}
 	if (isset($_SESSION["id"])) {
		unset($_SESSION["id"]);	
	}
	if (isset($_SESSION["username"])) {
		unset($_SESSION["username"]);           
	}
	if (isset($_SESSION["filename"])) {
		$filename = $_SESSION["filename"]; 
	}	
	else {
		$filename = "home-page.php";
	}	

	header("location: ".$filename);
	exit;
?>