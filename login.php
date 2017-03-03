<?php 
	include "head.php"; 
?>
	<header class="head">
		<h1 class="logo">Samfundet - Det socialaste nätverket</h3>
	</header>		
		<form class="login" action="logincheck.php" method="post">
			<fieldset>
			<h3>Logga in</h3>
					<input type="text" name="user" id="user" placeholder="Användarnamn">
					<input type="password" name="pass" id="pass" placeholder="Lösenord">
					<input type="submit" name="login" value="Logga in">
			</fieldset>
		</form>
		<form class="newuser" action="register.php" method="post">
			<fieldset>
				<h3>Ny användare? Registrera dig här</h3>
					<input type="text" name="fname" id="fname" placeholder="Förnamn">
					<input type="text" name="lname" id="lname" placeholder="Efternamn">
					<input type="text" name="newuser" id="newuser" placeholder="Användarnamn">
					<input type="password" name="newpass" id="newpass" placeholder="Lösenord">
					<input type="submit" name="register" value="Registrera användare">
			</fieldset>
		</form>

		<?php

		// If-satser om användaren skriver i fel uppgifter eller missar att fylla i alla fält

		if (isset ($_GET["unknown"]) && $_GET["unknown"] == "true") {
			echo "<p>Okänd användare, vänligen registrera din profil<p>";
		} 
		
		if (isset ($_GET["register"]) && $_GET["register"] == "true") {
			echo "<p>Användare registrerad! Vänligen logga in<p>";
		} 

		if (isset ($_GET["register"]) && $_GET["register"] == "false") {
			echo "<p>Registrering misslyckades, vänligen fyll i samtliga uppgifter<p>";
		} 

		if (isset ($_GET["logout"]) && $_GET["logout"] == true) {
			echo "<p>Du är nu utloggad!<p>";
		}

		?> 	


<?php 
	include "footer.php"; 

?>