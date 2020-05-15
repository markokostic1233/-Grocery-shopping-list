<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';
class Korisnik {
	public $id;
	public $email;
	public $password;
	public $ime_prezime;

	public static function register($email, $password, $ime_prezime) {
		$db = Database::getInstance();

		$query = 'INSERT INTO korisnici (email, ime_prezime, password) '.
				 'VALUES (:email, :ime_prezime, :password)';
		$params = [
			':email' => $email,
			':ime_prezime' => $ime_prezime,
			':password' => hash('sha512', $password)
		];

		$db->insert('Korisnik', $query, $params);

		return $db->lastInsertId();
	}

	public static function autentifikacija($email, $password) {
		$db = Database::getInstance();
		$query = 'SELECT * FROM korisnici '.
				'WHERE email = :email AND password = :password';
		$params = [
			':email' => $email,
			':password' => hash('sha512', $password)
		];
		$korisnici = $db->select('Korisnik', $query, $params);
		foreach($korisnici as $korisnik)
			return $korisnik;
		return null;
	}
}