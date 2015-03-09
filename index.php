<?php
	session_start();
	$con = mysqli_connect('mysql.hostinger.lt','u112186703_gecas','868468501','u112186703_music');
	include_once ("functions/functions.php"); 
	if(isset($_POST['prisijungti'], $_POST['password'],$_POST['username'])){
		$temp_name = trim(strip_tags($_POST['username']));
		$temp_password = trim(strip_tags($_POST['password']));

		checkacc($temp_name,$temp_password);
		  header("Location:index.php");
		/*if (!checkacc($temp_name,$temp_password)) {
			header
		}*/

	$year = time() + 31536000;
	setcookie('remember_me', $_POST['username'], $year);
	setcookie('remember_me2', $_POST['password'], $year);

	if($_POST['remember']) {
setcookie('remember_me', $_POST['username'], $year);
setcookie('remember_me2', $_POST['password'], $year);
}
else {

	header("Location:index.php");
	}	

}

//unset($_SESSION["item"]);

if (isset($_SESSION['logged_in'])) {
  $user_data = get_user_data($_SESSION['logged_in']);

}
 ?>
 <?php
if(isset($_GET['logout'])){
 	session_destroy();
 	header("Location:index.php");
 }

 if(isset($_POST['submit'])){
		$post_com_id=$_POST['news_id'];
		$comment_name=$_POST['comment_name'];
		$comment_email=$_POST['comment_email'];
		$comment_text=$_POST['comment_text'];

		$query_comment="insert into comments(news_id,comment_name,comment_email,comment_text)values('".$post_com_id."','".$comment_name."','".$comment_email."','".$comment_text."')";
		$run_query=mysqli_query($con,$query_comment);

		header("Location: ".$_SERVER["HTTP_REFERER"]);
		exit();

	}
 ?>

<?php
if (isset($_POST["edit_user"])) {
	$user_id=(int)$_POST['user_id'];
	$user_nick=trim(strip_tags($_POST['user_nick']));
	$user_name=trim(strip_tags($_POST['user_name']));
	$user_email=trim(strip_tags($_POST['user_email']));
	$user_password=trim(strip_tags($_POST['user_password']));
	$old_image=trim(strip_tags($_POST['old_image']));

	if (!empty($user_id) && !empty($user_nick) && !empty($user_name) && !empty($user_email) && !empty($user_password) && !empty($old_image) && filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
		if(!empty($_FILES['image']['tmp_name'])){

			$uploaddir = 'images/';
			//failo pletinio iskirpimas
			$file_type = explode(".", $_FILES["image"]["name"]);
			$file_type = end($file_type);

			//generuojamas unikalus failo pavadinimas
			$uniq_name = uniqid().".".$file_type;

			//kelias+pavadinimas
			$uploadfile = $uploaddir.$uniq_name;

			//failu kelimas
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

			unlink("images/".$old_image);
		 		
			$insert_user = "UPDATE user	set user_nick='".$user_nick."',user_name='".$user_name."',user_email='".$user_email."',user_password='".$user_password."',user_image='".$uniq_name."' where user_id='".$user_id."'";
			$insert_users = mysqli_query($con,$insert_user);

		}else{
			$update_user = "UPDATE user set user_nick='".$user_nick."',user_name='".$user_name."',user_email='".$user_email."',user_password='".$user_password."' where user_id='".$user_id."'";
		 	$update_users = mysqli_query($con,$update_user);
		}
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		exit();
	}else{
		$_SESSION["error"] = "Įvyko klaida !!!";
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		exit();
	}
}



if (isset($_SESSION["playlist_id"])) {
	unset($_SESSION["playlist_id"]);
}
if(isset($_POST['playlist'], $_SESSION["logged_in"])){

	$playlist_name = trim(strip_tags($_POST['playlist_name']));
	if (!empty($playlist_name)) {
		$insert_playlist = "INSERT INTO playlist(playlist_name,user_id) values ('".$playlist_name."','".$_SESSION["logged_in"]."')";
		$run_insert = mysqli_query($con,$insert_playlist);
	}
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit();
}
?>


<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
	<title>Muzika</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<!--<link rel="stylesheet" type="text/css" href="styles/style2.css">
	<link rel="stylesheet" type="text/css" href="styles/style3.css">-->

  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Exo+2&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/mediaelement-and-player.js"></script>
	<script type="text/javascript" src="js/mediaelement-and-player.min.js"></script>
	<link href="lightgallery/skins/snow/style.css" type="text/css" media="screen" rel="stylesheet" />
	<script src="lightgallery/lightgallery.min.js" type="text/javascript"></script>
	<script type="text/javascript">lightgallery.init({resizeSync: true});</script> 
	<script>
		$(document).ready(function(){
			$(".plus").click(function(){
			  $.post('includes/add_plus_one.php',{id: $(this).attr("picture_id")});
			});
			$.post('includes/get_user_playlist.php',function(data){
				$(".playlist_items").html(data);
			});

			$(".playlist_items").change(function(){
				$.post('includes/get_user_playlist_songs.php',{playlist_id: $(this).val(), attr: 1},function(data){
					$(".playlist_songs").html(data);
				});
			});
			$(".top_songs_play").on("click", ".add_to_playlist",function(){
				$.post('includes/add_to_playlist.php',{song_id: $(this).attr("song_id")},function(data){
					$.post('includes/test.php',function(data){
						$(".playlist_songs").html(data);
					});
				});
			});
		});
		function delete_song(id){
			if (confirm("Ar tikrai?")) {
				$.post('includes/delete_from_playlist.php',{delete_song: id});
				$.post('includes/get_user_playlist_songs.php',{attr: 1},function(data){
					$(".playlist_songs").html(data);
				});
			};
		};
	
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.add_to_playlist').click(function(){
    	$(this).attr('src', 'img/circle_green.png');
    });
	});
	</script>
	<script>
	function get_page(page){
             $('.smart-menu').slideUp(1000);
		$.post('includes/'+page+".php",function(data){$(".song").html(data);},"HTML");
	}
	</script>
</head>
<body>
<div class="wrapper">
	<div class="col1">
		<div class="subcol1">
			<span class="logo"><a href="index.php"><img src="img/logo3.png" width="50" height="50" style="margin-top:7px;" /></a>
			</span>
		</div>
		<!--Navigacija smart phone -->
		<nav class="smart-menu">
		<ul>
			<li><a href="index.php">Pradinis</a></li>
			<li><a href="#" onclick="get_page('news')">Naujienos</a></li>
			<li><a href="#" onclick="get_page('genre')">Žanrai</a></li>
			<li><a href="#" onclick="get_page('artist')">Atlikėjai</a></li>
			<li><a href="#" onclick="get_page('album')">Albumai</a></li>
		</ul>	
		</nav>

		<nav class="subcol2">
		<p>Meniu</p>
		<ul>
			<!--<li><a href="index.php?page=naujienos">Kas naujo ?</a></li>-->
			<li><a href="#" onclick="get_page('news')">Kas naujo ?</a></li>
			<!--<li><a href="index.php?page=zanrai">Žanrai</a></li>-->
			<li><a href="#" onclick="get_page('genre')">Žanrai</a></li>
			<!--<li><a href="index.php?page=atlikejai">Atlikėjai</a></li>-->
			<li><a href="#" onclick="get_page('artist')">Atlikėjai</a></li>
			<!--<li><a href="index.php?page=albumai">Albumai</a></li>-->
			<li><a href="#" onclick="get_page('album')">Albumai</a></li>
		</ul>
		</nav>
		<nav class="subcol3">
			<p>Grojarasčiai</p>
				<?php if(isset($_SESSION['logged_in'])){
				?>
			<div class="select_playlist" >
		
				<select class="playlist_items" name="playlist_items" id="" >
				</select> 
				</div>
				<?php } else { ?>
				<h3 align="center"style="color:#c9cacf;">Norėdami susikurti grojaraštį turite prisijungti!</h3>
				<?php } ?>
			
			<div class="playlist_songs topsongs top_songs_play">

			</div>
			<!--<ul>
				<li><a href="#">Mėgstami</a></li>
				<li><a href="#">Pop</a></li>
				<li><a href="#">Rokas</a></li>
				<li><a href="#">Country</a></li>
				<li><a href="#">Naujausi</a></li>
				<li><a href="#">Klausomi</a></li>
				<li><a href="#">Klausomi</a></li>
			</ul>-->
		</nav>
	</div>

	<div class="col2">

		<div class="input-group paieska">
		<form id="searchform" action="" method="GET">
		<input type="hidden" name="page" value="search">
  		<input type="search" name="search" class="form-control" placeholder="Ieškokite dainų, albumų,atlikėjų..." required>
  		<input type="submit" id="gBtn"/>
  		</form>
  		</div>
	<?php
		if(isset($_SESSION['logged_in'])){

	 ?>
	 <div class="user-info">
	 	<ul>
	 		<li><a title="Redaguoti profilį" class="user-photo" href="index.php?page=profile&user_id=<?php echo $user_data['user_id'] ?>"><img src="images/<?php echo $user_data["user_image"]?>" width='100' height='100'""></a></li>
	 		<li><a style="font-weight:bolder;" class="user-edit-profile" href="index.php?page=profile&user_id=<?php echo $user_data['user_id'] ?>"><?php echo $user_data['user_name'] ?></a></li>
	 		<div class="edit-profile"><li><a href="index.php?page=profile">Redaguotį profilį</a></li></div>
	 		<div class="create-playlist"><li><a href="index.php?page=playlist">Sukurti grojaraštį</a></li></div>
	 		 <div class="logout">
		<a href="index.php?logout">Atsijungti</a>
	</div>
	 	</ul>
	 </div>
	
	 <?php }else{ ?>
  		<form class="login-form" method="post" action="">
  		<input type="text" class="login-field" placeholder="Vartotojo vardas" name="username" value="<?php 
  			if (isset($_COOKIE['remember_me'])) {
  				echo $_COOKIE['remember_me']; 
  			}?>">
  		<input type="password" class="login-field"  placeholder="Slaptažodis" name="password" value="<?php
  			if (isset($_COOKIE['remember_me2'])) {
  				echo $_COOKIE['remember_me2']; 
  			}?>">
  		<input type="submit" id="login-submit" value="Prisijungti" name="prisijungti" />
  		<span style"display:none;"><input type="checkbox" style="opacity:0;display:none;" name="remember" value="1" class="login-checkbox" checked="true"/></span>
  		
  		</form>
		<span class="login-img"><a href="index.php?page=login" ><img src="img/login.png" title="Prisijungti" alt="Prisijungti" /></a></span>
		<span class="reg-form"><a href="index.php?page=registration" ><img src="img/create.png" title="Registracija" alt="Registracija" /></a></span>
	
	
			
	 <?php } ?>
	
	</div>

	<div class="col3">

    	<div class="song scroll">
    	
		<?php
		if(isset($_GET['page'])){
			switch ($_GET['page']) {
				case 'naujienos':
					include('includes/naujienos.php');
					break;

					case 'zanrai':
					include('includes/genres.php');
					break;

					case 'atlikejai':
					include('includes/atlikejai.php');
					break;

					case
					 'registration':
					include('includes/registracija.php');
					break;

					case 'details':
					include('includes/details.php');
					break;

					case 'albumai':
					include('includes/albumai.php');
					break;

					case 'search':
					include('includes/search.php');
					break;

					case 'artist_details':
					include('includes/artist_details.php');
					break;

					case 'album_details':
					include('includes/album_details.php');
					break;

					case 'profile':
					include('includes/profile.php');
					break;

					case 'playlist':
					include('includes/playlist.php');
					break;

					case 'add_to_playlist':
					include('includes/add_to_playlist.php');
					break;

					case 'login':
					include('includes/login.php');
					break;

					case 'genre_details':
					include('includes/genre_details.php');
					break;

				default:
					getSongs();
					break;
			}
		}else{
			getSongs(); 
		}

	
		 ?>
    	</div>
    </div>


	<div class="col4">
	<div class="newsongs">
	<p>Naujausios dainos</p>
		<?php
		get_new_songs();
		 ?></div>
		<div class="topsongs">
			<p>TOP dainos</p>
			<?php
			get_top_Songs();
			 ?>
		</div>
	</div>
	<div class="col5">
		<div class="subcol4">
		
		</div>
		<div class="subcol5">

		<div id="w" >
				
				 <div id="content" > 
				 <div class="audio-player">
				 <?php
				 global $con;

				 $audio = "SELECT * from song order by song_id desc";
				 $run_audio = mysqli_query($con,$audio);
				 $row_audio = mysqli_fetch_assoc($run_audio);
				 $song_file = $row_audio['song_file'];
				 $song_name = $row_audio['song_name'];

				 echo "<audio id='audio-player' src='songs/$song_file' type='audio/mp3' style='float:left' controls='controls'></audio>
					<h2 style='font-weight:200;'>$song_name</h2>
					
				
					"
					;

				  ?>
				 
				  
				 </div><!-- @end .audio-player -->
				 </div><!-- @end #content -->
				 </div><!-- @end #w -->


		</div>
		<div class="subcol6"></div>
	</div>
</div>

<!---------------------------------------------->

 <script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
