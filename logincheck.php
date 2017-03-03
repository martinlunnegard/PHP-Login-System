<?php 
session_start();

	//loginkontroll mot databasen

if (isset($_POST["login"])) {

	if ( !empty($_POST["user"]) && !empty($_POST["pass"]) ) {

		$conn = new mysqli("localhost", "root","", "inl2");

		$user = mysqli_real_escape_string($conn, $_POST["user"]);

		$pass = mysqli_real_escape_string($conn, $_POST["pass"]);

		$stmt = $conn->stmt_init();

		if($stmt->prepare("
			SELECT * FROM inl2 
			WHERE username = '{$user}'
			")) {
			$stmt->execute();

			$stmt->bind_result($id, $fname, $lname, $username, $password, $userpic_url);
			$stmt->fetch();

			//Skapar $_SESSION-variabler för inloggad användare

			$_SESSION["logged_in"] = true;
			$_SESSION["userid"] = $id;
			$_SESSION["fname"] = $fname;
			$_SESSION["lname"] = $lname;
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["userpic"] = $userpic_url; 

			//Kontrollerar mot databasen att det hashade lösenordet är korrekt
	
			if($id != 0 && password_verify($pass, $password) && $username == $user) {
				
				setcookie("username", $username, time() + (3600 * 8));
				header ('Location: dashboard.php');

				} else {
				header("Location: login.php?unknown=true");
				}
		}
	}
}				

?>