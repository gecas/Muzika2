<?php           
if(isset($_GET['album_id'])){

  $album_id2 = $_GET['album_id'];
  $album_songs2 = "SELECT * from song where album_id = '".$album_id2."'";
  $run_album_songs = mysqli_query($con,$album_songs2);

  $i = 0;
    while($row_songs3 = mysqli_fetch_assoc($run_album_songs)){
      $song_name3 = substr($row_songs3['song_name'],0,25 ).'...';
      $song_image3 = $row_songs3['song_image'];
      $song_file3 = $row_songs3['song_file'];
      $song_artist3 = $row_songs3['artist_id'];
      $song_album3 = $row_songs3['album_id'];
      $song_genre3 = $row_songs3['genre_id'];

      $albums3 = "SELECT * from album where album_id='".$song_album3."'";
      $run_album3 = mysqli_query($con,$albums3);
      $row_album3 = mysqli_fetch_array($run_album3);
      $album_name3 = $row_album3['album_name'];

      $artist3 = "SELECT * from artist where artist_id='".$song_artist3."'";
      $run_artist3 = mysqli_query($con,$artist3);
      $row_artist3 = mysqli_fetch_array($run_artist3);
      $artist_name3 = $row_artist3['artist_name'];?>
      <?php
      echo "

      <div class='songs top_songs_play'>
      <ul>
      <li>
       <img id=".$i." src='images/$song_image3' class='pic1' title='$song_name3' song_data='songs/$song_file3' >
      <img block_type='center' title='$song_name3' song_name='".$song_name3."' id=".$i." src='img/play2.png' class='pic2 pic1 plus' picture_id='".$row_songs3["song_id"]."' song_data='songs/$song_file3' >
      
      <h4>$song_name3</h4>
      <h5>$artist_name3</h5>
        </li>
        </ul>
      </div>
        ";

        $i++;
    }

}     
?>