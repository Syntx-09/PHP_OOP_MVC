<?php

trait Database
{
	// private function query_status() {
		
	// }
	public function connect() {
		$pdo = new PDO("mysql:hostname=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo '<hr>db conncted<hr>';
		return $pdo;
	}

	public function query($query, $data = []) {
		$pdo = $this->connect();
		$stmt = $pdo->prepare($query);

		$check = $stmt->execute($data);
		// $status = $stmt->rowCount();
		if ($check) {
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);
			// show($stmt);
			if (is_array($result) && count($result)) {
				// echo 'Query completed';
				return $result;
			}
		}
		// if ($status > 0) {
		// 	echo $query_status;
		// }
		// echo "No result found";
		return false;
	}

	public function read_all() {
		$query = "SELECT * from users";
		$result = $this->query($query);
		show($result);
	}

}
/* try to write a method or block of code that echo success to match the task carried out if succesddufl */