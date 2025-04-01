<?php

namespace MyApp\Models;
use MyApp\Config\DbConnection;
use PDO;

class chatModel 
{
	protected $dbh;

	public function __construct()
	{
		$this->dbh = DbConnection::getInstance()->getConnection();
	}

	public function insertMessage(int $userId, int $roomId, string $message)
	{
		$stmt = $this->dbh->prepare('INSERT INTO messages (user_id, room_id, msg_text, msg_date) VALUES (?, ?, ?, ?)');
        $stmt->execute([$userId, $roomId, $message, time()]);
	}

	public function getRooms()
	{
		$stmt = $this->dbh->query('SELECT * FROM rooms');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getMessages($roomId)
	{
		$stmt = $this->dbh->prepare('SELECT * FROM messages WHERE msg_room_id = ? ORDER BY msg_date ASC');
        $stmt->execute([$roomId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);	
	}
}
