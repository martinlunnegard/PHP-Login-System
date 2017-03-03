<?php

	//Registrerar ny användare och stoppar in värden i databasen

	if (isset ($_POST["register"])) {
		if( !empty($_POST["fname"])
			&& !empty($_POST["lname"])
			&& !empty($_POST["newuser"])
			&& !empty($_POST["newpass"]) ) {

		$fn = strip_tags($_POST["fname"]);
		$ln = strip_tags($_POST["lname"]);
		$nu = strip_tags($_POST["newuser"]);
		$np = strip_tags($_POST["newpass"]);
		$np = password_hash($np, PASSWORD_DEFAULT);

		$conn = new mysqli ("localhost", "root", "", "inl2");

		$query = "INSERT INTO inl2 VALUES (NULL, '$fn', '$ln', '$nu', '$np', NULL)";

		mysqli_query($conn, $query);
		header("Location: login.php?register=true");

		} else {
		header ("Location: login.php?register=false");
		}
	}


?>
