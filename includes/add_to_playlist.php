<?php 
	session_start();
	if (isset($_POST["song_id"], $_SESSION["logged_in"], $_SESSION["playlist_id"])) {
		$song_id = (int)$_POST["song_id"];
		$con = mysqli_connect("localhost", "root","","muzika");
		$playlist_songs = mysqli_query($con,"SELECT song_id from song WHERE song_id=".$song_id);
		if (mysqli_num_rows($playlist_songs) == 1) {
			$playlist_songs = mysqli_query($con,"INSERT INTO playlist_songs (song_id, playlist_id) VALUES('".$song_id."','".$_SESSION["playlist_id"]."')");
		}
		
	}
?>