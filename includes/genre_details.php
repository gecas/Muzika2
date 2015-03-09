<?php           
if(isset($_GET['genre_id'])){

  $genre_id4 = (int)$_GET['genre_id'];
  $genre_songs4 = "SELECT * from song where genre_id = '".$genre_id4."'";
  $run_genre_songs = mysqli_query($con,$genre_songs4);

  $i = 0;
    while($row_songs4 = mysqli_fetch_assoc($run_genre_songs)){
      $song_name4 = substr($row_songs4['song_name'],0,25 ).'...';
      $song_image4 = $row_songs4['song_image'];
      $song_file4 = $row_songs4['song_file'];
      $song_artist4 = $row_songs4['artist_id'];
      $song_album4 = $row_songs4['album_id'];
      $song_genre4 = $row_songs4['genre_id'];

      $albums4 = "SELECT * from album where album_id='".$song_album4."'";
      $run_album4 = mysqli_query($con,$albums4);
      $row_album4 = mysqli_fetch_array($run_album4);
      $album_name4 = $row_album4['album_name'];

      $artist4 = "SELECT * from artist where artist_id='".$song_artist4."'";
      $run_artist4 = mysqli_query($con,$artist4);
      $row_artist4 = mysqli_fetch_array($run_artist4);
      $artist_name4 = $row_artist4['artist_name'];?>
      <?php
      echo "

      <div class='songs top_songs_play'>
      <ul>
      <li>
       <img id=".$i." src='images/$song_image4' class='pic1' title='$song_name4' song_data='songs/$song_file4' >
      <img block_type='center' title='$song_name4' song_name='".$song_name4."' id=".$i." src='img/play2.png' class='pic2 pic1 plus' picture_id='".$row_songs4["song_id"]."' song_data='songs/$song_file4' >
      
      <h4>$song_name4</h4>
      <h5>$artist_name4</h5>
        </li>
        </ul>
      </div>
        ";

        $i++;
    }

}     
?>