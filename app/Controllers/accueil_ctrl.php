<?php
//Affichage des Views

use app\Controllers\render\TwigRenderer;

$twig = new TwigRenderer();
$twig->render('page_accueil.html.twig', [
    'titre' => 'Bienvenue'
]);

?>

