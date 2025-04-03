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

	public function insertMessage(int $msg_user_id, int $msg_room_id, string $msg_text, int $msg_date, string $msg_color )
	{
		$stmt = $this->dbh->prepare('INSERT INTO messages (msg_user_id, msg_room_id, msg_text, msg_date, msg_color) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$msg_user_id, $msg_room_id, $msg_text, $msg_date, $msg_color, $color]);
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

	public function getRoomName($roomId) {
		$stmt = $this->dbh->prepare('SELECT room_name FROM rooms WHERE room_id = ?');
		$stmt->execute([$roomId]);
		$room = $stmt->fetch(PDO::FETCH_ASSOC);
		return $room['room_name'];
	}
}
