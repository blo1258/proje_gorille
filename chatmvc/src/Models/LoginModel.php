<?php

namespace MyApp\Models;

//use ici le namespace des classes que tu utilises

use MyApp\Config\DbConnection;
use PDO;
use PDOExeption;

class loginModel
{
	protected $dbh;

	public function __construct()
	{
		$this->dbh = DbConnection::getInstance()->getConnection();
	}

	public function existsUser($userName, $password)
	{
		$stmt = $this->dbh->prepare('SELECT * FROM users WHERE user_name = ?');
		$stmt->execute([$userName]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($user && password_verify($password, $user['password'])) {
			return true;
		} else {
			return false;
		}
	}

	public function createUser($userName, $password, $email) 	{
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->dbh->prepare('INSERT INTO users (user_name, user_password, user_email) VALUE (?, ?, ?)');
		$stmt->execute([$userName, $hashedPassword, $email]);
	}

	public function uptadePassword(string $email, string $password) {
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->dbh->prepare('UPDATE users SET user_password = ? WHERE user_email = ?');
		$stmt->execute([$hashedPassword, $email]);
	}
	
	public function getUserName($userName) {
		$stmt = $this->dbh->prepare('SELECT * FROM users WHERE user_name = ?');
		$stmt->execute([$userName]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
		
	}

