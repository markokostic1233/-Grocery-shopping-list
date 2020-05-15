<?php

session_start();
if(!isset($_POST['email'])) {
	header('Location: ../login.php');
	die();
}

$email = $_POST['email'];
$password = $_POST['password'];

require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnik = Korisnik::autentifikacija($email, $password);

if($korisnik === null) {
	header('Location: ../login.php?error=email');
	die();
}

$_SESSION['korisnik_id'] = $korisnik->id;
header('Location: ../index.php');