<?php $con = mysqli_connect('localhost','root','','muzika');
?>
<?php
if(isset($_POST['submit'])){
	$post_com_id=$news_new_id;
	$comment_name=$_POST['comment_name'];
	$comment_email=$_POST['comment_email'];
	$comment_text=$_POST['comment_text'];


	$query_comment="insert into comments(news_id,comment_name,comment_email,comment_text)values('$post_com_id','$comment_name','$comment_email','$comment_text')";
	$run_query=mysqli_query($con,$query_comment);

}
global $post_com_id;
header("Location:index.php?page=details&news_id='$post_com_id'");
?>
