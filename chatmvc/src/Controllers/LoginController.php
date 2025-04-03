<?php

namespace MyApp\Controllers;

// use ici le namespace des classes que tu utilises
use MyApp\Models\LoginModel;



class loginController
{
	private $loginModel;	

	//protected $oLoginModel;

	public function __construct()
	{
		$this->loginModel = new LoginModel();
	}

	/**
	 * Méthode permettant à l'utilisateur de se logger
	 *
	 * @param 
	 * @return void
	 */
	public function loginIndex()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
		$userName = $_POST['pseudo'];
		$password = $_POST['password'];
		
		$user = $this->loginModel->getUserName($userName);

		if ($user && password_verify($password, $user['user_password'])) {
		// connexion reussie, rediriger vers le chat

		$colors = ['red', 'blue', 'green', 'gray', 'orange'];
		$color = $colors[array_rand($colors)];

		$_SESSION['color'] = $color;
		header('Location:chat/ChatView');
		exit;
	} else {
	 // information didentification incorrectes
	$error = "Pseudo ou mot de passe incorrect !";

	header('Location:login/loginIndex');

	// include '../chatmvc/src/Views/login/LoginView.php';
	// return;

	}		
	}
		include '../chatmvc/src/Views/login/LoginView.php';
	}

	public function signup()
	{
		var_dump($_POST);
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
		$userName = $_POST['pseudo'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$this->loginModel->createUser($userName, $password, $email);

		header('Location: ' . URL . '/Views/chat/ChatView');
		exit;
		var_dump(URL);
	}
		include '../chatmvc/src/Views/login/SignupView.php';
}

	public function forgotpassword()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forgotPassword'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			// mis a jour
			$this->loginModel->updatePassword($email, $password);
			header('Location: ' . URL . '/Views/chat/ChatView');
			exit;
		}
		include '../chatmvc/src/Views/login/ForgotPasswordView.php';

	}

	public function loadModel ($modelName) 
	{
		$modelClass = 'MyApp\Models\\' . $modelName;
		$this->loginModel = new $modelClass();
	}

	public function render(string $fichier, array $data = []): void
	{
		extract($data);
		include ROOT . 'src/Views' . $fichier . '.php';
	}
}
