<?php 
	session_start();  
	include "head.php"; 
?>

	<!-- HTML Form för att ladda upp profilbild -->
	<form method="post" enctype="multipart/form-data">	
		<input type="file" name="profile_pic">
		<input type="submit" name="upload" value="Ladda upp profilbild">
	</form>

	<?php 

	if (isset($_POST["upload"])) {

		$target_folder = "userpics/"; 
		$target_name = $target_folder . basename("user-".$_SESSION["userid"].".jpg");

		if ($_FILES["profile_pic"]["size"] > 10000000) {
			echo "Filen är för stor";
		}

		$type = pathinfo($target_name, PATHINFO_EXTENSION);
		if ($type != "jpg") {
			echo "Endast JPG-filer är tillåtna";
		}

		if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_name)) {

			$conn = new mysqli("localhost", "root", "", "inl2");

			$userid = $_SESSION["userid"];

			$query = "UPDATE inl2 SET userpic_url = '{$target_name}' WHERE id = '{$userid}'";

			$stmt = $conn->stmt_init();

			if($stmt->prepare($query)) {
				$stmt->execute();
				echo "Profilbilden uppdaterad<br>";
				$_SESSION["userpic"] = $target_name;
			}else {
				echo mysqli_error(); 
			}

		} else {
			echo "Ett fel har uppstått";
		}


	} ?>
		<div class="links">
			<a href="dashboard.php">Till din profil</a>
		</div>

<?php
	include "footer.php";
?>	

	