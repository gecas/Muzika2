<?php           
if(isset($_GET['artist_id'])){

  $artist_id2 = $_GET['artist_id'];
  $artist_songs2 = "SELECT * from song where artist_id = '".$artist_id2."'";
  $run_artist_songs = mysqli_query($con,$artist_songs2);

  $i = 0;
    while($row_songs2 = mysqli_fetch_assoc($run_artist_songs)){
      $song_name2 = substr($row_songs2['song_name'],0,25 ).'...';
      $song_image2 = $row_songs2['song_image'];
      $song_file2 = $row_songs2['song_file'];
      $song_artist2 = $row_songs2['artist_id'];
      $song_album2 = $row_songs2['album_id'];
      $song_genre2 = $row_songs2['genre_id'];

      $artists2 = "SELECT * from artist where artist_id='".$song_artist2."'";
      $run_artist2 = mysqli_query($con,$artists2);
      $row_artist2 = mysqli_fetch_array($run_artist2);
      $artist_name2 = $row_artist2['artist_name'];

      echo "
      <div class='songs top_songs_play'>
      <ul>
      <li>
      <img id=".$i." src='images/$song_image2' class='pic1' title='$song_name2' song_data='songs/$song_file2' >
      <img block_type='center' title='$song_name2' song_name='".$song_name2."' id=".$i." src='img/play2.png' class='pic2 pic1 plus' picture_id='".$row_songs2["song_id"]."' song_data='songs/$song_file2' >
      
      <h4>$song_name2</h4>
        <h5>$artist_name2</h5>
        </li>
        </ul>
      </div>
        ";

        $i++;
    }

}     
?>