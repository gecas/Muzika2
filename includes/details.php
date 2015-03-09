<?php
  if(isset($_GET['news_id'])){

    //straipsniai
    $news_id = $_GET['news_id'];
    $get_new = "select * from news where news_id='".$news_id."'";
    $run_new = mysqli_query($con,$get_new);

    if (mysqli_num_rows($run_new)) {
      $row_new = mysqli_fetch_array($run_new);
      $new_id = $row_new['news_id'];
      $new_title = $row_new['news_title'];
      $news_text = $row_new['news_text'];


      //paveiksleliai
      $get_new2 = "SELECT image_name from images where news_id='$news_id'";
      $run_new2 = mysqli_query($con,$get_new2);
      $row_new2 = mysqli_fetch_array($run_new2);
      $image_name = $row_new2['image_name'];

      //komentarai
      $news_new_id = (int)$_GET['news_id'];
      $run_comments=mysqli_query($con,"select * from comments where news_id='".$news_new_id."'");
      $count=mysqli_num_rows($run_comments);

      ?>
        <section class='news-block-details'>
          <a href='images/<?php echo $image_name ?>' rel='lightgallery[flowers]'>
            <div class='news-block-details-big-img'>
              <img src='images/<?php echo $image_name ?>'>
            </div>
          </a>
          <br/>

          <header><h2><?php echo $new_title ?></h2></header>
          <article>
            <p>
              <?php echo $news_text ?>
            </p>
          </article>
        </section>
        <div><h2 align='center'>Nuotraukos:</h2></div>

        <figure>
          <ul>
          <?php
          while($row_new2 = mysqli_fetch_array($run_new2)){
            $image_name = $row_new2['image_name'];
            ?>
              <li>
                <a href='images/<?php echo $image_name ?>' rel='lightgallery[flowers]'>
                  <div class='news-block-details-sm-img'>
                   <img src='images/<?php echo $image_name ?>' >
                  </div>
                </a> 
              </li> 
            <?php
          } 
          ?>
            <div style='clear:both;'></div>
          </ul>
        </figure>


        <!-- Forma komentarams -->
        <h2 class='comment' style="color:#4d5d6d;">Komentarų kol kas (<?php echo $count;?>)</h2>
        <?php
          while($row_comments=mysqli_fetch_array($run_comments)){
            ?>
              <h3 style='background:#4d5d6d;padding-left:10px; color:#c9cacf;'>
                <?php echo $row_comments['comment_name'] ?> 
                <em>sako:</em>
              </h3>
              <p style='background-color:white; padding-left:5px;color:#4d5d6d;'>
                <?php echo $row_comments['comment_text'] ?>
              </p>
            <?php
          }
        ?>

        <div class="comment-box">
          <form method="post" action="">
          <input type="hidden" name="news_id" value="<?php echo $news_new_id ?>">
          <h2 style="color:#4d5d6d;">Komentarai : </h2>
          <table width="565px" align="center" bgcolor="#333">

            <tr>
            <td><span style="color:#4d5d6d;">Vardas</span></td>
            <td><input type="text" name="comment_name"/></td>
            </tr>

              <tr>
            <td>El. paštas</td>
            <td><input type="text" name="comment_email"/></td>
            </tr>

              <tr>
            <td>Komentaras</td>
            <td><textarea name="comment_text" cols="50" rows="16"></textarea></td>
            </tr>

            <tr>
            <td colspan="6"><input type="submit" name="submit" value="Komentuoti"/></td>
            </tr>

          </table>
          </form>
        </div>
      <?php
    }else{
      ?>
      <h1>Nera :D</h1>
      <?php
    }
}
 
?>
