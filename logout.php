<?php
session_start();
	
	//Dödar SESSIONS-variablerna och loggar ut användaren

	$_SESSION["logged_in"] = false;
	unset($_SESSION["userid"]);
	unset($_SESSION["fname"]);
	unset($_SESSION["lname"]); 
	unset($_SESSION["username"]); 
	unset($_SESSION["password"]); 
	unset($_SESSION["userpic"]); 	


	session_destroy();

	header("Location: login.php?logout=true"); 

?>