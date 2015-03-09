<div class="reg_form">
<form method="post" action="includes/reg_check.php" enctype="multipart/form-data">
	<div><label>Įveskite slapyvardį</label><input type="text" placeholder="Slapyvardis" name="username" /></div>
	<div><label>Įveskite vardą</label><input type="text" placeholder="Vardas" name="name" /></div>
	<div><label>Įveskite el.paštą</label><input type="text" placeholder="El.paštas" name="email" /></div>
	<div><label>Įveskite slaptažodį</label><input type="password" placeholder="Slaptažodis" name="password" /></div>
	<div>
	<label>Įkelkite nuotrauką</label> <br/>

	<div id="file_block">
	<input type='file' id='file_browse' name="image" accept="image/*">
	</div>

	<div class="files_names"></div>

	</div>
	<div><input type="submit" value="Pateikti" class="reg-submit" name="registracija" /></div>
</form>
</div>
