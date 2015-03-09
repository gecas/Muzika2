<?php
	session_start();
	if (isset($_SESSION["logged_in"])) {
		$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');

		if(isset($_POST['delete_song'])){
			$id = (int)$_POST['delete_song'];
			$query = "DELETE from playlist_songs where playlist_song_id='".$id."'";
			$run_query = mysqli_query($con,$query);
	  }
	}
	//header("Location:../index.php");
	//exit();
 ?>