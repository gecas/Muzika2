<?php
$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
 ?>


	<script src="../../js/tinymce/js/tinymce/tinymce.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>

	
	<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">
			<tr align="center">
				<td colspan="2"><h2>Pridėti naujieną</h2></td>
			</tr>

			<tr>
				<td align="center">Naujienos pavadinimas</td>
				<td><input type="text" name="news_title" size="60" required/></td>
			</tr>


				<tr>
				<td align="center">Naujienos paveiksliukas</td>
				<td>
				<input type="file" name="file[]" multiple />
				</td>
			</tr>


				<tr>
				<td align="center">Naujienos tekstas</td>
				<td><textarea name="news_text" cols="100" rows="10"></textarea></td>
			</tr>

				<tr>
				<td colspan="2" align="right"><input type="submit" name="insert_news" /></td>
			</tr>

			</table>
	</form>

<?php

 if(isset($_POST['insert_news'])){

 	//form text data
 	$news_title = $_POST['news_title'];
 	$news_text = $_POST['news_text'];
 	

 	//tikrinimas ar yra tuščių laukų
 	if(!empty($news_title)&&!empty($news_text)){

 	//form image
		if($_FILES){
			//failu ikelimo aplankas
			$uploaddir = '../../images/';
			//failu kiekis
			$c=count($_FILES['file']['name']);
			$insert_news = "INSERT INTO news 
		(news_title,news_text) 
		values ('".$news_title."','".$news_text."')";

			 $insert_new = mysqli_query($con,$insert_news);

			 $get_new = mysqli_insert_id($con);

			//failu kelimas i serveri
			for($i=0; $i<$c; $i++){
				//failo pletinio iskirpimas
				$file_type = explode(".", $_FILES["file"]["name"][$i]);

				$file_type = end($file_type);

				//generuojamas unikalus failo pavadinimas
				$uniq_name = uniqid().".".$file_type;

				//kelias+pavadinimas
				$uploadfile = $uploaddir.$uniq_name;

				//failu kelimas
				move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadfile);
		 		
		 		$insert_news_images = "INSERT INTO images 
			 	(image_name,news_id) 
			 	values ('".$uniq_name."','".$get_new."')";

			 	$insert_new_image = mysqli_query($con,$insert_news_images);

			}
			
		}
 			header("Location: insert_news.php");
 		}
 	}

?>