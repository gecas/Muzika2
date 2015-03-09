<?php 
	session_start();
	if (isset($_SESSION["logged_in"])) {
		$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
		$playlist = mysqli_query($con,"SELECT * from playlist WHERE user_id='".$_SESSION["logged_in"]."'");
		
		while ($row = mysqli_fetch_assoc($playlist)) {
			?>
			<option value="<?php echo $row["playlist_id"] ?>"><?php echo $row["playlist_name"] ?>
			</option>
			<?php
		}
	} else {
		echo "<h1>Grojarasčių nėra</h1>";
	}
	
?>