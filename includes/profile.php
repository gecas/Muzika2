	<?php
		$edit_user = (int)$_SESSION["logged_in"];
		$run_user = mysqli_query($con,"SELECT * from user where user_id='$edit_user'");

		$row_users=mysqli_fetch_array($run_user);
		$user_id=$row_users['user_id'];
		$user_nick=$row_users['user_nick'];
		$user_name=$row_users['user_name'];
		$user_email=$row_users['user_email'];
		$user_password=$row_users['user_password'];
		$user_image = $row_users['user_image'];
	?>
	<div class="profile-edit-form">
	<form action="" method="POST" enctype="multipart/form-data">
			<?php 
				if (isset($_SESSION["error"])) {
					echo "<h3 style='color: red'>".$_SESSION["error"]."</h3>";
					unset($_SESSION["error"]);
				}
			 ?>
			<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
			<input type="hidden" name="old_image" value="<?php echo $user_image ?>">
			<table align="center" width="900" >
			<tr align="center">
				<td colspan="2"><h2>Redaguoti profilį</h2></td>
			</tr>

			<tr>
				<td align="center">Vartotojo slapyvardis</td>
				<td><input type="text"  name="user_nick"  value="<?php echo $user_nick; ?>" required/></td>
			</tr>

			<tr>
				<td align="center">Vartotojo vardas</td>
				<td><input type="text" name="user_name" size="60" value="<?php echo $user_name; ?>" required/></td>
			</tr>

			<tr>
				<td align="center">Vartotojo el.paštas</td>
				<td><input type="text" name="user_email" size="60" value="<?php echo $user_email; ?>" required/></td>
			</tr>

	        <tr>
				<td align="center">Vartotojo slaptažodis</td>
				<td><input type="password" name="user_password" size="60" value="<?php echo $user_password; ?>" required/></td>
			</tr>

			<tr>
					<td align="center">Vartotojo paveiksliukas</td>
					<td>
						<div style="width: 30px; height: 30px; position: relative; float: left;margin-top:3px;">
							<img src="images/<?php echo $user_image ?>" style="max-width: 100%; max-height: 100%; position: absolute; margin:auto; left: 0; right: 0;top: 0; bottom: 0;"/>
						</div>
						<div id="file_block" style="width: 30px; height: 30px;float: left;">
							<input style="width: 30px; height: 30px; " type='file' id='file_browse' name="image" accept="image/*">
						</div>
						<div class="files_names" style="float: left;"></div>
						<div style="clear: both"></div>
					</td>
				</tr>

			<tr>
				<td colspan="2" align="right"><input type="submit" name="edit_user" /></td>
			</tr>

			</table>
	</form>
	</div>