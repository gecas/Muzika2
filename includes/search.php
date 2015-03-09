<?php 
if (isset($_GET["search"])) {
	$test = 0;
    $param = trim(strip_tags($_GET["search"]));
    if (!empty($param)) {
    
	$search_query = explode(" ", $param);
	$search_query = "song_name like '%".implode("%' AND song_name like '%", $search_query)."%'";
	$get_pro = "select * from song where ".$search_query."";
	$run_songs = mysqli_query($con,$get_pro);
	if (mysqli_num_rows($run_songs) >=1) {
		?>
			<h1>Dainos :</h1>
			<div class='top_songs_play songs'>
			<ul>
		<?php
			$i = 0;
			while($row_songs = mysqli_fetch_assoc($run_songs)){
				$song_name = substr($row_songs['song_name'],0,25 ).'...';
				$song_image = $row_songs['song_image'];
				$song_file = $row_songs['song_file'];
				$song_artist = $row_songs['artist_id'];
				$song_album = $row_songs['album_id'];
				$song_genre = $row_songs['genre_id'];

				$artists = "SELECT * from artist where artist_id='$song_artist'";
				$run_artist = mysqli_query($con,$artists);
				$row_artist = mysqli_fetch_array($run_artist);
	     		$artist_name = $row_artist['artist_name'];
	     		?>

				<li>
				<img id="<?php echo $i ?>" src='images/<?php echo $song_image ?>' class='pic1' song_data='songs/<?php echo $song_file ?>'song_name='<?php echo ".$song_name."?>' >
				<img id="<?php echo $i ?>" src='img/play2.png' class='pic2 pic1' song_data='songs/<?php echo $song_file ?>' song_name='<?php echo "$song_name"?>' >
				
				<h4><?php echo $song_name ?></h4>
	    		<h5><?php echo $artist_name ?></h5>
	    		</li>
	    		<?php

	    		$i++;
	    	}
	    	?>

	    		</ul>
				</div>
				<hr style="width: 100%">
	    	<?php
    }else{
    	$test++;
    }
	?>
	<?php
		$search_query2 = explode(" ", $param);
		$search_query2 = "album_name like '%".implode("%' AND album_name like '%", $search_query2)."%'";
		$get_pro2 = "select * from album WHERE ".$search_query2."";
		$run_album = mysqli_query($con,$get_pro2);
		if (mysqli_num_rows($run_album) >=1) {
			?>
			<h1>Albumai :</h1>
			<div class= 'top_songs_play songs'>
				<ul>
			<?php
			while($row_album = mysqli_fetch_assoc($run_album)){
				$album_id = $row_album['album_id'];
				?>
				<li><a href="<?php echo "index.php?page=album_details&album_id=$album_id"; ?>"><img src='images/<?php echo $row_album['album_image'] ?>'></a>
	    		<h4 style="margin-top: 0"><?php echo $row_album['album_name']; ?></h4>
	    		</li>
	    		<?php
			}
			?>
			</ul>
			</div>
			<hr style="width: 100%">
			<?php
		}else{
    		$test++;
    	}
	?>
	<?php
		$search_query3 = explode(" ", $param);
		$search_query3 = "artist_name like '%".implode("%' AND artist_name like '%", $search_query3)."%'";
		$get_pro3 = "select * from artist WHERE ".$search_query3."";
		$run_artist = mysqli_query($con,$get_pro3);
		if (mysqli_num_rows($run_artist) >=1) {
			?>
			<h1>Atlikėjas :</h1>
			<div class='songs'>
			<ul>
			<?php
			while($row_artist = mysqli_fetch_assoc($run_artist)){
				$artist_id = $row_artist['artist_id'];
				?>
				<li><a href="<?php echo "index.php?page=artist_details&artist_id=$artist_id"; ?>"><img src='images/<?php echo $row_artist['artist_image'] ?>'></a>
	    		<h4 style="margin-top: 0"><?php echo $row_artist['artist_name']; ?></h4>
	    		</li>
	    		<?php
			}
			?>
			</ul>
			</div>
			<?php
		}else{
	    	$test++;
	    }

	    if ($test == 3) {
	    	?>
	    	<h1>Nebuvo rasta rezultatų</h1>
	    	<?php
	    }
	}else{
		?>
		<h1>Nebuvo rasta rezultatų arba neteisingai įvesta reikšmė </h1>
		<?php
	}
}
