<?php
//Ket noi CSDL voi PHP theo PDO
class DB {
	private static $conn = NULl;
	public static function connect() {
		if (!isset(self::$conn)) {
			try {
				self::$conn = new PDO('mysql:host=localhost;dbname=db_to_practice', 'root', '');
				self::$conn->exec("SET NAMES 'utf8'");
			} catch (PDOException $ex) {
				die($ex->getMessage());
			}
		}
		return self::$conn;
	}
}
?>

