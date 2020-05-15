<?php
session_start();
if(!isset($_SESSION['korisnik_id'])) {
	header("Location: ../login.php");
	die();
}

if(!isset($_POST['namirnica_id'])) {
	header('Location: ../index.php');
	die();
}

$namirnica_id = $_POST['namirnica_id'];
require_once __DIR__ . '/../tabele/Namirnica.php';
Namirnica::kupljeno($namirnica_id);
echo '{"uspeh":"true"}';