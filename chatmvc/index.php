<?php

use MyApp\Controllers\loginController;
use MyApp\Controllers\ChatController;


require_once 'vendor/autoload.php';

// Démarre une Session
session_start();

// Stocke la racine du site (ex: C:/wamp/www/chatmvc/ )
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// Stocke la racine du site (ex: http://localhost/chatmvc )
define('URL', 'http://localhost/projet_gorille/chatmvc');

// *******
// ROUTEUR
// *******

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', htmlspecialchars($_GET['action'] ?? ''));

    
// Si le 2nd paramètre existe
if (isset($params[1])) {
    
    if ($params[0] === 'chat' && is_numeric($params[1])) { // is_numeric() ile sayısal ID kontrolü
        $chatController = new ChatController();
        $chatController->room($params[1]);
        exit();
    }

    // On sauvegarde le 1er paramètre dans $controller
    // puis, on lui en ajoute le suffixe Controller.
   $controller = ucfirst(htmlspecialchars($params[0])) . 'Controller';
    
    // On sauvegarde le 2ème paramètre dans $method
    $method = htmlspecialchars($params[1]);
   
    // On appelle le controlleur correspondant
    
    try {
    $controller = 'MyApp\Controllers\\' . $controller;
    // On instancie la classe correspondante
   
    $oController = new $controller();
        
      
    // On vérifie si la méthode existe bien dans la classe
    if (method_exists($oController, $method)) {
        // On appelle la méthode $method du controleur $controller
        $oController->$method();
    } else {
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";

    }
}catch (Exception $e) {
    echo "Erreur ".$e->getMessage();
}
} else {
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut : loginController

    // On instancie le contrôleur
    $oController = new loginController();

    // On appelle la méthode login
    $oController->loginIndex();
}

