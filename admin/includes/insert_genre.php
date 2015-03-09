<?php
$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');

 ?>

	
	<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">

			<tr align="center">
				<td colspan="2"><h2>Pridėti naują žanrą</h2></td>
			</tr>

			<tr>
				<td align="center">Žanro pavadinimas</td>
				<td><input type="text" name="genre_name" size="60" required/></td>
			</tr>

				<tr>
				<td align="center">Žanro paveiksliukas</td>
					<td><input type="file" name="genre_image" /></td>
			</tr>

				<tr>
				<td colspan="2" align="right"><input type="submit" name="insert_genre" value="Pateikti" /></td>
			</tr>

		
			</table>
	</form>


<?php

 if(isset($_POST['insert_genre'])){
 	//form text data
 	$genre_name = $_POST['genre_name'];
 	
 	//form image

 	$genre_image = $_FILES['genre_image']['name'];
 	$genre_image_tmp = $_FILES['genre_image']['tmp_name'];
 

 	move_uploaded_file($genre_image_tmp, "../../images/".$genre_image);

 	$insert_genre = "INSERT INTO genre
 	(genre_name,genre_image) 
 	values ('".$genre_name."','".$genre_image."')";

 	$run_genre = mysqli_query($con,$insert_genre);

 	if($run_genre){
 		header("Location:insert_genre.php");
 	}
 }

?>