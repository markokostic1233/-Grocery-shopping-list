<?php
session_start();
if(!isset($_SESSION['korisnik_id'])) {
	header('Location: login.php');
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Namirnice</title>
	
	<script src="js/jquery-3.3.1.min.js"></script>

	<script>
		$(function() {
			$('input[name="namirnica_id"]').on('change', function(e) {
				var namirnica_id = $(this).val()
				var checkbox = $(this)
				if(this.checked) {
					$.ajax({
						'method':'post',
						'url':'logika/kupljeno.php',
						'data': {
							'namirnica_id':namirnica_id
						},
						success: function(odgovor) {
							var odgovor = JSON.parse(odgovor)
							if(odgovor.uspeh == 'true') {
								checkbox.parent().addClass('prekrizeno')
								checkbox.remove()
							}

						}
					})
				}
			})
		})
	</script>
	<style>
		.prekrizeno {
			text-decoration: line-through;
			color:#999;
		}
	</style>
</head>
<body>
<form action="logika/unos_namirnice.php" method="post">
	<input type="text" name="namirnica"
			placeholder="Unesite namirnicu"
			required><br>
	<input type="submit" value="Unesi">
</form>
<?php
	require_once __DIR__ . '/tabele/Namirnica.php';
	$namirnice = Namirnica::getAll();
?>
<ul>
	<?php foreach($namirnice as $namirnica): ?>
		<li>
			<label <?php
					if($namirnica->kupljeno != 0)
						echo 'class="prekrizeno"';
					?>
			>
				<?= $namirnica->naziv ?>
				<?php if($namirnica->kupljeno == 0): ?>
					<input type="checkbox"
							name="namirnica_id"
							value="<?= $namirnica->id ?>">
				<?php endif ?>
			</label>
		</li>
	<?php endforeach ?>
</ul>
</body>
</html>