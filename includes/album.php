<?php
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
		$album = "SELECT * from album order by rand()";
		$run_album = mysqli_query($con,$album);

		while($row_album = mysqli_fetch_assoc($run_album)){
			$album_id = $row_album['album_id'];
			$album_name = $row_album['album_name'];
			$album_image = $row_album['album_image'];

			echo "
			<div class='genres'>
			<ul>
			<li class='artist'><a href='index.php?page=album_details&album_id=".$album_id."'><img src='images/$album_image'></a>
    		<h4>$album_name</h4>
    		</li>
    		</ul>
    		</div>";
		}

		
 ?>