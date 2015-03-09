<?php
$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');


	function getSongs(){
		global $con;

		$songs = "SELECT * from song order by rand()";
		$run_songs = mysqli_query($con,$songs);

		$i = 0;
		while($row_songs = mysqli_fetch_assoc($run_songs)){
			$song_name = substr($row_songs['song_name'],0,25 ).'...';
			$song_name_img = $row_songs['song_name'];
			$song_image = $row_songs['song_image'];
			$song_file = $row_songs['song_file'];
			$song_artist = $row_songs['artist_id'];
			$song_album = $row_songs['album_id'];
			$song_genre = $row_songs['genre_id'];

			$artists = "SELECT * from artist where artist_id='$song_artist'";
			$run_artist = mysqli_query($con,$artists);
			$row_artist = mysqli_fetch_array($run_artist);
     		$artist_name = $row_artist['artist_name'];

			echo "
			<div class='songs top_songs_play'>
			<ul>
			<li>
			<style>
				.add_to_playlist:hover{
					cursor: pointer;
				}
			</style>"?> <?php
			if(isset($_SESSION['logged_in'])){
				?>
			
    		<?php } ?>
    		<?php echo "
			<img id=".$i." src='images/$song_image' class='pic1' title='$song_name_img' song_data='songs/$song_file' >
			<img block_type='center' title='$song_name_img' song_name='".$song_name."' id=".$i." src='img/play2.png' class='pic2 pic1 plus' picture_id='".$row_songs["song_id"]."' song_data='songs/$song_file' >
			
			<h4>$song_name</h4>
    		<h5>$artist_name</h5>"?>
    		<?php
			if(isset($_SESSION['logged_in'])){
				?>
    		<div class='add_to_playlist'><img song_id='<?php echo  $row_songs["song_id"]?>' class='add_to_playlist change_green' title='Pridėti į grojaraštį' src='img/add.png' alt=''></div>
			<?php } ?>
			<?php echo "
    		<!--<h3 class='add_to_playlist' song_id='".$row_songs["song_id"]."'>ADD </h3>-->
    		
    		</li>
    		</ul>
			</div>
    		";

    		$i++;
		}

	}

	function get_artist(){
		global $con;

		$artist = "SELECT * from artist order by rand()";
		$run_artist2 = mysqli_query($con,$artist);

		while($row_artist = mysqli_fetch_assoc($run_artist2)){
			$artist_id = $row_artist['artist_id'];
			$artist_name = $row_artist['artist_name'];
			$artist_image = $row_artist['artist_image'];

			echo "
			<ul>
			<li class='artist'><a href='index.php?page=artist_details&artist_id=".$artist_id."'><img src='images/$artist_image'></a>
    		<h4>$artist_name</h4>
    		</li>
    		</ul>";
		}
	}

	function get_album(){
		global $con;

		$album = "SELECT * from album order by rand()";
		$run_album = mysqli_query($con,$album);

		while($row_album = mysqli_fetch_assoc($run_album)){
			$album_id = $row_album['album_id'];
			$album_name = $row_album['album_name'];
			$album_image = $row_album['album_image'];

			echo "
			<ul>
			<li class='artist'><a href='index.php?page=album_details&album_id=".$album_id."'><img src='images/$album_image'></a>
    		<h4>$album_name</h4>
    		</li>
    		</ul>";
		}
	}

	function get_genres(){
		global $con;

		$genres = "SELECT * from genre order by rand()";
		$run_genres2 = mysqli_query($con,$genres);

		while($row_genres = mysqli_fetch_assoc($run_genres2)){
			$genre_id = $row_genres['genre_id'];
			$genre_name = $row_genres['genre_name'];
			$genre_image = $row_genres['genre_image'];

			echo "
			<div class='songs'>
			<ul>
			<li><img src='images/$genre_image'>
    		<h4>$genre_name</h4>
    		</li>
    		</ul>
    		</div>";
		}
	}

	function checkacc($temp_name,$temp_password){
	global $con;

		$get_acc = "SELECT user_id from user where user_nick ='".$temp_name."' and user_password = '".$temp_password."'";
 		$run_acc = mysqli_query($con,$get_acc);
 		$count_acc = mysqli_num_rows($run_acc);
 		if($count_acc==1){
 			$row_acc = mysqli_fetch_array($run_acc);
 			$_SESSION['logged_in'] = $row_acc['user_id'];
 			return true;
 			  header("Location:index.php");
 		} else{
 			return false;
 		}
	}

	function get_user_data($user_id){
		global $con;

		$get_acc = "SELECT * from user where user_id='$user_id'";
 		$run_acc = mysqli_query($con,$get_acc);
 		return mysqli_fetch_array($run_acc);
	}

	function news(){
	global $con;

	$get_new = "SELECT * from news order by news_id desc";
	 $run_new = mysqli_query($con,$get_new);
	 $count_news = mysqli_num_rows($run_new);
	 if($count_news==0){
 		echo "<h2>Nebuvo rasta rezultatų</h2>";
 	}else{

	while($row_new = mysqli_fetch_array($run_new)){

      $news_id = $row_new['news_id'];
      $news_title = substr($row_new['news_title'],0,100 ).'...';
      $news_title2 = $row_new['news_title'];
      $news_text = substr($row_new['news_text'],0,100 ).'...';
      
  

      $get_new2 = "SELECT image_name from images where news_id='".$news_id."'";
      $run_new2 = mysqli_query($con,$get_new2);
      $row_new2 = mysqli_fetch_array($run_new2);
      $image_name = $row_new2['image_name'];

  echo "
  		<ul>  
  		<li>
		<section class='news-block'>
		<a href='index.php?page=details&news_id=$news_id' style='float:left;'><img src='images/$image_name' title='$news_title2'/></a>
		<header><a href='index.php?page=details&news_id=$news_id' style='float:left;'>$news_title</a></header>
		<article>
		<p>
			$news_text
		</p>
		</article>
			<div class='news-block-link'>
			<a href='index.php?page=details&news_id=$news_id'>Daugiau...</a>
			</div>
		</section>
    	</li>
    	</ul>";
      } 
  }
}	

/*function searchSong($param){
	global $con;
	$search_query = explode(" ", $param);
	$search_query = "song_name like '%".implode("%' AND song_name like '%", $search_query)."%'";
	$get_pro = "select * from song where ".$search_query."";
	$run_songs = mysqli_query($con,$get_pro);
	if (mysqli_num_rows($run_songs) >=1) {
		?>
				<h1>Songs</h1>
				<div class='songs'>
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
				<img id="<?php echo $i ?>" src='images/<?php echo $song_image ?>' class='pic1' song_data='songs/<?php echo $song_file ?>' >
				<img id="<?php echo $i ?>" src='img/play2.png' class='pic2 pic1' song_data='songs/<?php echo $song_file ?>' >
				
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
	    }
	?>
	<?php
		$search_query2 = explode(" ", $param);
		$search_query2 = "album_name like '%".implode("%' AND album_name like '%", $search_query2)."%'";
		$get_pro2 = "select * from album WHERE ".$search_query2."";
		$run_album = mysqli_query($con,$get_pro2);
		if (mysqli_num_rows($run_album) >=1) {
			?>

			
				<h1>Album</h1>
			<div class='songs'>
				<ul>
			<?php
			while($row_album = mysqli_fetch_assoc($run_album)){
				$album_id = $row_album['album_id'];
				?>
				<li><img src='images/<?php echo $row_album['album_image'] ?>'>
	    		<h4 style="margin-top: 0"><?php echo $row_album['album_name']; ?></h4>
	    		</li>
	    		<?php
			}
			?>
			</ul>
			</div>
			<hr style="width: 100%">
			<?php
		}
	?>
		<?php
			$search_query3 = explode(" ", $param);
			$search_query3 = "artist_name like '%".implode("%' AND artist_name like '%", $search_query3)."%'";
			$get_pro3 = "select * from artist WHERE ".$search_query3."";
			$run_artist = mysqli_query($con,$get_pro3);
			if (mysqli_num_rows($run_artist) >=1) {
				?>
				<h1>Artist</h1>
				<div class='songs'>
				<ul>
				<?php
				while($row_artist = mysqli_fetch_assoc($run_artist)){
					$artist_id = $row_artist['artist_id'];
					?>
					<li><img src='images/<?php echo $row_artist['artist_image'] ?>'>
		    		<h4 style="margin-top: 0"><?php echo $row_artist['artist_name']; ?></h4>
		    		</li>
		    		<?php
				}
				?>
				</ul>
				</div>
				<?php
			}
			

}*/

function get_new_Songs(){
		global $con;

		$songs = "SELECT * from song order by song_id desc";
		$run_songs = mysqli_query($con,$songs);

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

			echo "
			<div class='new_songs top_songs_play'>
			<ul>
			<li>
			<img id=".$i." src='images/$song_image' class='pic1' song_data='songs/$song_file' >
			<img block_type='new' song_name='".$song_name."' id=".$i." src='img/play2.png' class='pic2 pic1' song_data='songs/$song_file' >
			
			<h4>$song_name</h4>
    		<h5>$artist_name</h5>
    		</li>
    		</ul>
			</div>
    		";

    		$i++;
		}

	}

	function get_top_Songs(){
		global $con;

		$top_songs = "SELECT * from song order by like_id desc";
		$run_top_songs = mysqli_query($con,$top_songs);

		$i = 0;
		while($row_top_songs = mysqli_fetch_assoc($run_top_songs)){
			$song_top_name = substr($row_top_songs['song_name'],0,25 ).'...';
			$song_top_image = $row_top_songs['song_image'];
			$song_top_file = $row_top_songs['song_file'];
			$song_top_artist = $row_top_songs['artist_id'];
			$song_top_album = $row_top_songs['album_id'];
			$song_top_genre = $row_top_songs['genre_id'];

			$top_artists = "SELECT * from artist where artist_id='$song_top_artist'";
			$run_top_artist = mysqli_query($con,$top_artists);
			$row_top_artist = mysqli_fetch_array($run_top_artist);
     		$artist_top_name = $row_top_artist['artist_name'];

			echo "
			<div class='new_songs top_songs_play'>
			<ul>
			<li>
			<img id=".$i." src='images/$song_top_image' class='pic1' song_data='songs/$song_top_file' >
			<img block_type='top' song_name='$song_top_name' id=".$i." src='img/play2.png' class='pic2 pic1' song_data='songs/$song_top_file' >
			
			<h4>$song_top_name</h4>
    		<h5>$artist_top_name</h5>
    		</li>
    		</ul>
			</div>
    		";

    		$i++;
		}

	}
 ?>