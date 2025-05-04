<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['mode']) && $input['mode'] === 'invite') {
    // ici, tu pourrais démarrer une session, enregistrer un état invité, etc.
    session_start();
    $_SESSION['utilisateur'] = 'invité';

    echo json_encode([
        'success' => true,
        'redirect' => '?action=accueil' // à adapter à ta route réelle
    ]);
} else {
    echo json_encode(['success' => false]);
}
