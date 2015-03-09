<?php
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
 ?>
 <div class="playlist_form">
<form method="post" action="" enctype="multipart/form-data">
	<div><label>Grojarasčio pavadinimas</label><input type="text" placeholder="Pavadinimas" name="playlist_name" /></div><br/>
	<div><input type="submit" value="Pateikti" class="reg-submit" name="playlist" /></div>
</form>
</div>

<div class="modify-playlist">
	<table align="center" width="900" class="playlist-names">
			<tr align="center">
				<td colspan="2"><h2>Grojarasčiai</h2></td>
			</tr>

			<tr align='center'>
			
			</tr>

			<?php
			$user_id2 = $user_data['user_id']; 
			$get_playlist = "SELECT * from playlist where user_id=".$user_id2."";
			$run_get = mysqli_query($con,$get_playlist);

			while($row_playlist = mysqli_fetch_array($run_get)){
				$playlist = $row_playlist['playlist_name'];
				$playlist_id = $row_playlist['playlist_id'];

				echo "<tr>
				
				<td>$playlist</td>
				<td align='center' class='delete_playlist'><a href='index.php?page=delete_playlist'>Ištrinti</a></td>
			</tr>";
			}	
			 ?>
			</table>
</div>