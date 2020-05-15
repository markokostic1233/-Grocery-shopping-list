<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Registracija</title>


		<style>
		

		

</style>
	  
</head>
<body>
	




<form action="logika/registrujse.php" method="post">
	<input type="text" name="ime_prezime"
			placeholder="Unesite ime i prezime"
			required><br>
	<input type="email" name="email"
			placeholder="Unesite e-mail"
			required><br>
	<input type="password" name="password"
			placeholder="Unesite password"
			required><br>
	<input type="password" name="password_repeat"
			placeholder="Ponovite password"
			required><br>
	<input type="submit" value="Registruj se">
	<?php if(isset($_GET['error'])): ?>
		<div id="error">
		<?php if($_GET['error'] == 'password'): ?>
			Passwordi se ne podudaraju.
		<?php else: ?>
			Vec postoji korisnik sa tim e-mailom.
		<?php endif ?>
		</div>
	<?php endif ?>
</form>
</body>
</html>