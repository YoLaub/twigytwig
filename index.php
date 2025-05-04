<?php
require __DIR__.'/vendor/autoload.php';
// Inclusion des fichiers de configuration et des classes principales
require dirname(__FILE__) . "/app/config.php";

use app\Controllers\axe\Routes;
use app\Controllers\axe\RoutesPrive;

// Démarrer la session si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si on est sur une route admin
if (isset($_GET["admin"]) && $_GET["admin"] === "1") {
    $route = new RoutesPrive();
} else {
    $route = new Routes();
}

// Récupérer l'action demandée, sinon utiliser la valeur par défaut
$action = $_GET["action"] ?? "defaut";
$route->redirection($action); 

?>

