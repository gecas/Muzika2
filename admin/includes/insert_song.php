<?php
$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
 ?>

	
	<form action="insert_song.php" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">

			<tr align="center">
				<td colspan="2"><h2>Pridėti naują dainą</h2></td>
			</tr>

			<tr>
				<td align="center">Dainos pavadinimas</td>
				<td><input type="text" name="song_name" size="60" required/></td>
			</tr>

				<tr>
				<td align="center">Dainos paveiksliukas</td>
					<td><input type="file" name="song_image" /></td>
			</tr>

				<tr>
				<td align="center">Dainos failas</td>
					<td><input type="file" name="song_file" /></td>
			</tr>

				
				<tr>
				<td align="center">Artistas</td>
				<td>
					<select name="song_artist" required>
						<option>Pasirinkite atlikėją</option>
						<?php

						$get_artist = "SELECT * from artist";

						$run_artist = mysqli_query($con,$get_artist);

						while($row_artist=mysqli_fetch_array($run_artist)){

						$artist_id = $row_artist['artist_id'];
						$artist_name = $row_artist['artist_name'];

						echo "<option value='$artist_id'>$artist_name</option>";
					}

						?>
					</select>
				</td>
			</tr>

			<tr>
				<td align="center">Albumas</td>
				<td>
					<select name="song_album">
						<option>Pasirinkite albumą</option>
						<?php

						$get_album = "SELECT * from album";

						$run_album = mysqli_query($con,$get_album);

						while($row_album=mysqli_fetch_array($run_album)){

						$album_id = $row_album['album_id'];
						$album_name = $row_album['album_name'];

						echo "<option value='$album_id'>$album_name</option>";
					}

						?>
					</select>
				</td>
			</tr>

			<tr>
				<td align="center">Žanras</td>
				<td>
					<select name="song_genre" required>
						<option>Pasirinkite žanrą</option>
						<?php

						$get_genre = "SELECT * from genre";

						$run_genre = mysqli_query($con,$get_genre);

						while($row_genre=mysqli_fetch_array($run_genre)){

						$genre_id = $row_genre['genre_id'];
						$genre_name = $row_genre['genre_name'];

						echo "<option value='$genre_id'>$genre_name</option>";
					}

						?>
					</select>
				</td>
			</tr>

				<tr>
				<td colspan="2" align="right"><input type="submit" name="insert_post" value="Pateikti" /></td>
			</tr>

		
			</table>
	</form>


<?php

 if(isset($_POST['insert_post'])){
 	//form text data
 	$song_name = $_POST['song_name'];
 	$song_artist = $_POST['song_artist'];
 	$song_album = $_POST['song_album'];
 	$song_genre = $_POST['song_genre'];

 	//form image

 	$song_image = iconv("utf-8","cp936", $_FILES['song_image']['name']);
 	$song_image_tmp = $_FILES['song_image']['tmp_name'];

 	$song_file = $_FILES['song_file']['name'];
 	$song_file_tmp = $_FILES['song_file']['tmp_name'];

 

 	move_uploaded_file($song_image_tmp, "../../images/".$song_image);
 	move_uploaded_file($song_file_tmp, "../../songs/".$song_file);

 	$insert_song = "INSERT INTO song
 	(song_name,song_file,song_image,artist_id,album_id,genre_id) 
 	values ('".$song_name."','".$song_file."','".$song_image."','".$song_artist."',
 		'".$song_album."','".$song_genre."')";

 	$insert_songo = mysqli_query($con,$insert_song);

 	if($insert_songo){
 		header("Location:insert_song.php");
 	}
 }

?>