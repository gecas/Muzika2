<link rel="stylesheet" type="text/css" href="styles/style.css">
<?php 
	session_start();
	if (isset($_SESSION["playlist_id"])) {
		$playlist_id = $_SESSION["playlist_id"];
		$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
		$playlist_songs = mysqli_query($con,"SELECT song.song_name, song.song_file, song.song_image,  artist.artist_name from playlist_songs, artist, song WHERE  playlist_songs.playlist_id='".$playlist_id."' AND playlist_songs.song_id = song.song_id AND song.artist_id=artist.artist_id ORDER BY  playlist_songs.playlist_song_id");
		$i = 0;
		if (mysqli_num_rows($playlist_songs) > 0) {
			while ($row = mysqli_fetch_assoc($playlist_songs)) {
				?>
				<div class='new_songs top_songs_play'>
					<ul>
						<li>
							<img id="<?php echo $i ?>" src='images/<?php echo $row["song_image"] ?>' class='pic1' song_data='songs/<?php echo $row["song_file"] ?>' >
							<img block_type='playlist' song_name='<?php echo $row["song_name"] ?>' id="<?php echo $i ?>" src='img/play2.png' class='pic2 pic1' song_data='songs/<?php echo $row["song_file"] ?>' >
							
							<h4><?php echo $row["song_name"] ?></h4>
				    		<h5><?php echo $row["artist_name"] ?></h5>
			    		</li>
					</ul>
				</div>
	    		<?php
	    		$i++;
			}
		}
	}
?>