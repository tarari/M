
<?php
  $menu=array(
      'Inici'=>APP_W
      
    );
  include 'common.php';
?>
<nav>
    <?php
      MMenu::create($menu);
    ?>
  </nav><h2>User Register</h2>
	<div class="registre">
		<form class="form-reg" action="<?= APP_W.'register/reg';?>" method="post">
			<p><label for="nom">Nom</br><input type="text" name="nom"></label></p>
			<p><label for="email">Email</br><input type="text" name="email"></label></p>
			<p><label for="passwd">Passwd</br><input type="password" name="passwd" id="pass"></label></p>
			<p><label for="repasswd">Reescriu password</br><input type="password" name="repasswd" id="repass"></label></p>
			<p><input type="submit" class="btn" value="Registra"></p>
		</form>
	</div>
