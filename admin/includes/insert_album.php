<?php
$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');

 ?>

	
	<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">

			<tr align="center">
				<td colspan="2"><h2>Pridėti naują albumą</h2></td>
			</tr>

			<tr>
				<td align="center">Albumo pavadinimas</td>
				<td><input type="text" name="album_name" size="60" required/></td>
			</tr>

				<tr>
				<td align="center">Albumo paveiksliukas</td>
					<td><input type="file" name="album_image" /></td>
			</tr>

				<tr>
				<td colspan="2" align="right"><input type="submit" name="insert_album" value="Pateikti" /></td>
			</tr>

		
			</table>
	</form>


<?php

 if(isset($_POST['insert_album'])){
 	//form text data
 	$album_name = $_POST['album_name'];
 	
 	//form image

 	$album_image = $_FILES['album_image']['name'];
 	$album_image_tmp = $_FILES['album_image']['tmp_name'];
 

 	move_uploaded_file($album_image_tmp, "../../images/".$album_image);

 	$insert_album = "INSERT INTO album
 	(album_name,album_image) 
 	values ('".$album_name."','".$album_image."')";

 	$run_album = mysqli_query($con,$insert_album);

 	if($run_album){
 		header("Location:insert_album.php");
 	}
 }

?>