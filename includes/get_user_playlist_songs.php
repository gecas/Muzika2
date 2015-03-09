<?php 
	session_start();
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
	if (isset($_SESSION["logged_in"], $_POST["playlist_id"])) {
		$playlist_id = (int)$_POST["playlist_id"];
		$playlist_songs = mysqli_query($con,"SELECT song.song_id,song.song_name, song.song_file, song.song_image,  artist.artist_name,playlist_songs.playlist_song_id  from playlist_songs, artist, song WHERE  playlist_songs.playlist_id='".$playlist_id."' AND playlist_songs.song_id = song.song_id AND song.artist_id=artist.artist_id ORDER BY  playlist_songs.playlist_song_id desc");
		$i = 0;
		if (mysqli_num_rows($playlist_songs) > 0) {
			while ($row = mysqli_fetch_assoc($playlist_songs)) {
				?>
				<div class='new_songs playlist-songs top_songs_play'>
					<ul>
						<li>
							<img id="<?php echo $i ?>" src='images/<?php echo $row["song_image"] ?>' class='pic1 playlist-img' song_data='songs/<?php echo $row["song_file"] ?>' >
							<img block_type='playlist' song_name='<?php echo $row["song_name"] ?>' id="<?php echo $i ?>" src='img/play2.png' class='pic2 pic1 playlist-img'  song_data='songs/<?php echo $row["song_file"] ?>' >
							
							<h4><?php echo substr($row['song_name'],0,25 ).'...';?></h4>
				    		<h5><?php echo $row["artist_name"] ?></h5>
				    		<div class="delete_playlist_song">
				    		<a onclick="delete_song(<?php echo $row["playlist_song_id"] ?>)" href="#"><img src="img/delete.png"/ width="10px" height="10px"></a>
				    		</div>
			    		</li>
					</ul>
				</div>
	    		<?php
	    		$i++;
			}
			$_SESSION["playlist_id"] = $playlist_id;
		}else{
			?>
			<h1>Nebuvo rasta dainų</h1>
			<?php
			$_SESSION["playlist_id"] = $playlist_id;
		}
	}elseif(isset($_SESSION["logged_in"], $_POST["attr"])){
			$playlist_songs = mysqli_query($con,"SELECT song.song_id,song.song_name, song.song_file, song.song_image,  artist.artist_name,playlist_songs.playlist_song_id  from playlist_songs, artist, song WHERE  playlist_songs.playlist_id='".$_SESSION["playlist_id"]."' AND playlist_songs.song_id = song.song_id AND song.artist_id=artist.artist_id ORDER BY  playlist_songs.playlist_song_id desc");
			$i = 0;
			if (mysqli_num_rows($playlist_songs) > 0) {
				while ($row = mysqli_fetch_assoc($playlist_songs)) {
					?>
					<div class='new_songs playlist-songs top_songs_play'>
						<ul>
							<li>
								<img id="<?php echo $i ?>" src='images/<?php echo $row["song_image"] ?>' class='pic1 playlist-img' song_data='songs/<?php echo $row["song_file"] ?>' >
								<img block_type='playlist' song_name='<?php echo $row["song_name"] ?>' id="<?php echo $i ?>" src='img/play2.png' class='pic2 pic1 playlist-img'  song_data='songs/<?php echo $row["song_file"] ?>' >
								
								<h4><?php echo substr($row['song_name'],0,25 ).'...';?></h4>
					    		<h5><?php echo $row["artist_name"] ?></h5>
					    		<div class="delete_playlist_song">
					    		<a onclick="delete_song('<?php echo $row["playlist_song_id"] ?>')" href="#">
					    		<img src="img/delete.png"/ width="10px" height="10px"></a>
					    		</div>
				    		</li>
						</ul>
					</div>
		    		<?php
		    		$i++;
				}
			}
		}
?>