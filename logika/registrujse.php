<?php
if(!isset($_POST['email'])) {
	header('Location: ../registracija.php');
	die();
}

$email = $_POST['email'];
$ime_prezime = $_POST['ime_prezime'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if($password !== $password_repeat) {
	header('Location: ../registracija.php?error=password');
	die();
}

try {
	require_once __DIR__ . '/../tabele/Korisnik.php';
	$id = Korisnik::register($email, $password, $ime_prezime);
	if($id > 0) {
		header('Location: ../login.php');
		die();
	}
} catch(Exception $e) {}

header('Location: ../registracija.php?error=email');