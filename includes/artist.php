<?php 
	
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
	$artist = "SELECT * from artist order by rand()";
	$run_artist2 = mysqli_query($con,$artist);

	while($row_artist = mysqli_fetch_assoc($run_artist2)){
		$artist_id = $row_artist['artist_id'];
		$artist_name = $row_artist['artist_name'];
		$artist_image = $row_artist['artist_image'];

		echo "
		<div class='artist'>
		<ul>
		<li><a href='index.php?page=artist_details&artist_id=".$artist_id."'><img src='images/$artist_image'></a>
		<h4>$artist_name</h4>
		</li>
		</ul>
		</div>";
	}
?>