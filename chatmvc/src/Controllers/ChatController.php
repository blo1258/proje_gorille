<?php

namespace MyApp\Controllers;

// use ici le namespace des classes que tu utilises
use MyApp\Models\chatModel;

class ChatController
{
	private $chatModel;
	public function __construct()
	{
		$this->chatModel = new ChatModel();
	}

	public function chatView() {
		
		// get All Messages from DB -> $data['messages']
		// render chatView with $data

		$data['rooms'] = $this->chatModel->getRooms();
		$data['currentroom'] = 'CHAT BLO';
		$data['currentroomid'] = 1;
		$data['messages'] = $this->chatModel->getMessages(1);
		$data['user'] = 'Nom utilisateur';

		include ROOT . 'src/Views/chat/ChatView.php';

	}

	

}
