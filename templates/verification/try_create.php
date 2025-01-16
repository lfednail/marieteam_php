<?php
require_once 'verify.php';

$requiredFields = ['Lieu_depart', 'Lieu_arrivee', 'Distance_liaison'];
if (array_diff($requiredFields, array_keys($_POST))) {
    $_POST['error'][] = "All fields must be filled.";
    header('location: create');
    exit;
}

if (
    verifieString($_POST['Lieu_depart']) &&
    verifieString($_POST['Lieu_arrivee']) &&
    verifieString($_POST['Distance_liaison'])
) {
    $lieuDepart = $_POST['Lieu_depart'];
    $lieuArrivee = $_POST['Lieu_arrivee'];
    $distanceLiaison = $_POST['Distance_liaison'];

    $db->insert("INSERT INTO liaison (Lieu_depart, Lieu_arrivee, Distance_liaison) 
                 VALUES ('{$lieuDepart}', '{$lieuArrivee}', '{$distanceLiaison}')");
} else {
    $_POST['error'][] = "SQL injection attempt detected.";
    header('location: create');
    exit;
}
