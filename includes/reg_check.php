<?php
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');

	if(isset($_POST['registracija'])){

		$nickname = $_POST['username'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$image = $_FILES['image']['name'];
 	    $image_tmp = $_FILES['image']['tmp_name'];
 

 	move_uploaded_file($image_tmp, "images/".$image);

 	$insert_user = "INSERT INTO user
 	(user_nick,user_name,user_email,user_password,user_image) 
 	values ('".$nickname."','".$name."','".$email."','".$password."','".$image."')";

 	$run_user = mysqli_query($con,$insert_user);

 	if($run_user){
 		header("Location:../index.php?page=registration");
 		exit();
 	}
	}
 ?>