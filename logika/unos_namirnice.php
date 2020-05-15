<?php
session_start();
if(!isset($_SESSION['korisnik_id'])) {
	header('Location: ../login.php');
	die();
}

if(!isset($_POST['namirnica'])) {
	header('Location: ../index.php');
	die();
}

$naziv = $_POST['namirnica'];
$korisnik_id = $_SESSION['korisnik_id'];

require_once __DIR__ . '/../tabele/Namirnica.php';

$id = Namirnica::unesi($naziv, $korisnik_id);
if($id > 0) {
	header('Location: ../index.php');
	die();
}

header('Location: ../index.php?error=unknown');