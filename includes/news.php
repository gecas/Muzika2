<?php 
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
	

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
 ?>