<?php
	$news_new_id = (int)$_GET['news_id'];
	$run_comments=mysqli_query($con,"select * from comments where news_id='".$news_new_id."'");
	$count=mysqli_num_rows($run_comments);
?>
	<h2 style="color:#4d5d6d;">Komentarų kol kas (<?php echo $count;?>)</h2>
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


