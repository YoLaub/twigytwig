<?php
//Affichage des Views

use app\Controllers\render\TwigRenderer;

$twig = new TwigRenderer();
$twig->render('connexion.html.twig', [
    'titre' => 'Connexion'
]);

?>