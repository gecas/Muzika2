<?php 
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
	
	$genres = "SELECT * from genre order by rand()";
	$run_genres2 = mysqli_query($con,$genres);

	while($row_genres = mysqli_fetch_assoc($run_genres2)){
		$genre_id = $row_genres['genre_id'];
		$genre_name = $row_genres['genre_name'];
		$genre_image = $row_genres['genre_image'];

		echo "
		<div class='genres'>
		<ul>
		<li><a href='index.php?page=genre_details&genre_id=".$genre_id."'><img src='images/$genre_image'></a>
		<h4>$genre_name</h4>
		</li>
		</ul>
		</div>";
	}
 ?>