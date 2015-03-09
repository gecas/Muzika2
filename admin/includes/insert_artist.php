<?php
$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');

 ?>

	
	<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">

			<tr align="center">
				<td colspan="2"><h2>Pridėti naują atlikėją</h2></td>
			</tr>

			<tr>
				<td align="center">Atlikėjo pavadinimas</td>
				<td><input type="text" name="artist_name" size="60" required/></td>
			</tr>

				<tr>
				<td align="center">Atlikėjo paveiksliukas</td>
					<td><input type="file" name="artist_image" /></td>
			</tr>

				<tr>
				<td colspan="2" align="right"><input type="submit" name="insert_artist" value="Pateikti" /></td>
			</tr>

		
			</table>
	</form>


<?php

 if(isset($_POST['insert_artist'])){
 	//form text data
 	$artist_name = $_POST['artist_name'];
 	
 	//form image

 	$artist_image = $_FILES['artist_image']['name'];
 	$artist_image_tmp = $_FILES['artist_image']['tmp_name'];
 

 	move_uploaded_file($artist_image_tmp, "../../images/".$artist_image);

 	$insert_artist = "INSERT INTO artist
 	(artist_name,artist_image) 
 	values ('".$artist_name."','".$artist_image."')";

 	$run_artist = mysqli_query($con,$insert_artist);

 	if($run_artist){
 		header("Location:insert_artist.php");
 	}
 }

?>