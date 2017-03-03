<?php 
	session_start(); 
	include "head.php"; 
?>

	<header class="head">
		<h1>Välkommen <?php echo $_SESSION["fname"]. " " . $_SESSION["lname"]; ?>!</h1>
	</header>	


		<!-- Öppnar "container" -->
		<div class="container">
		<?php 


		if ($_SESSION["userpic"] != NULL) {

			echo "<img class='profile' src='".$_SESSION["userpic"]."' alt='Profilbild på ".$_SESSION["username"]."'>";
			} else {
			echo $_SESSION["username"]. " " . "min bror, <br> Du måste ladda upp en profilbild!";	
			}

		?>
				
		<h3>Dina uppgifter:</h3>
			<table class="my_table">
				<tr>
					 <td><span class="bold">Förnamn:</span> <?php echo $_SESSION["fname"]. "<br>"; ?> </td> 
				</tr> 	
				<tr> 
					<td><span class="bold">Efternamn:</span> <?php echo $_SESSION["lname"].  "<br>"; ?></td>
				</tr>	
				<tr> 
					<td><span class="bold">Användarnamn:</span> <?php echo $_SESSION["username"]. "<br>"; ?></td>
				</tr>	
			</table>
			<!-- Öppnar "links" -->
			<div class="links">
				<a href="upload.php">Byt profilbild</a><br>
				<a href="logout.php">Logga ut</a>
			<!-- Stänger "links" -->	
			</div>	
			<!-- Stänger "container" -->	
			</div>
		

	<?php 
	include "footer.php"; 
	?>