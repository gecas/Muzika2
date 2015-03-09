<form class="login-form" method="post" action="">
  		<input type="text" class="login-field" placeholder="Vartotojo vardas" name="username" value="<?php 
  			if (isset($_COOKIE['remember_me'])) {
  				echo $_COOKIE['remember_me']; 
  			}?>">
  		<input type="password" class="login-field"  placeholder="Slaptažodis" name="password" value="<?php
  			if (isset($_COOKIE['remember_me2'])) {
  				echo $_COOKIE['remember_me2']; 
  			}?>">
  		<input type="submit" id="login-submit" value="Prisijungti" name="prisijungti" /><br/>
  		<input type="checkbox" name="remember" value="1" checked="true"><span style="color:#c9cacf;"></span>
  		
  		</form>