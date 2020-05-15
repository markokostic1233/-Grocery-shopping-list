<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';
class Namirnica {
	public $id;
	public $naziv;
	public $kupljeno;
	public $korisnik_id;

	public static function unesi($naziv, $korisnik_id) {
		$db = Database::getInstance();

		$query = 'INSERT INTO namirnice (naziv, korisnik_id) '.
				'VALUES (:naziv, :korisnik_id)';
		$params = [
			':naziv' => $naziv,
			':korisnik_id' => $korisnik_id
		];

		$db->insert('Namirnica', $query, $params);

		return $db->lastInsertId();
	}

	public static function getAll() {
		$db = Database::getInstance();

		$query = 'SELECT * '.
				'FROM namirnice';
		$namirnice = $db->select('Namirnica', $query);
		return $namirnice;
	}

	public static function kupljeno($namirnica_id) {
		$db = Database::getInstance();

		$query = 'UPDATE namirnice '.
				'SET kupljeno = 1 '.
				'WHERE id = :id';
		$params = [
			':id' => $namirnica_id
		];

		$db->update('Namirnica', $query, $params);
	}
}