<?php
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
if (isset($_POST['id'])) {

	$id = (int)$_POST['id'];
	$like = mysqli_query($con,"SELECT like_id from song WHERE song_id='".$id."'");
	$row_like = mysqli_fetch_assoc($like);
	$like_new = $row_like['like_id'];
	$like_new++;

	$update_like = "UPDATE song set
			like_id='".$like_new."' where song_id='".$id."'";
	$run_update = mysqli_query($con,$update_like);
}
 ?>