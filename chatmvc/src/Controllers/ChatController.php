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

		$this->render('chat/ChatView' , $data);
	}

	public function chatIndex()
    {
        $data['rooms'] = $this->chatModel->getRooms();
        $this->render('chat/ChatView', $data);
    }

	public function search() {
		$query = $_GET['query'];
		$results = $this->chatModel->searchRoom($query);
		$data['results'] = $results;
		
		$this->render('chat/SearchView', $data);
	}

	public function loadModel($modelName) {
		$modelClass = 'MyApp\Models\\' .$modelName;
		$this->chatModel = new $modelClass();
	}

	public function render(string $fichier, array $data = []): void {
		extract($data);
		include ROOT . 'src/Views/'. $fichier . '.php';
	}
	
	public function room($roomId) {
		$data['rooms'] = $this->chatModel->getRooms();
		$data['currentroom'] = $this->chatModel->getRoomName($roomId);
		$data['currentroomid'] = $roomId;
		$data['messages'] = $this->chatModel->getMessages($roomId);
		$data['user'] = 'Nom utilisateur';

		$this->render('chat/ChatView', $data);
	}

	public function insert() {
		$msg_text = $_POST['msg_text'];
    $msg_user_id = $_POST['msg_user_id'];
    $msg_room_id = $_POST['msg_room_id'];
    $msg_color = $_POST['msg_color'];
    $msg_date = $_POST['msg_date'];

	$color = $_SESSION['color'];

    $result = $this->chatModel->insertMessage($msg_user_id, $msg_room_id, $msg_text, $msg_date, $msg_color);

		if($result) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false, 'error' => 'Message na pas enregiste!']);
		}
	}
	
}
