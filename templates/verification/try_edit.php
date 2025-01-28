<?php
require_once 'verify.php';

$requiredFields = ['Lieu_depart', 'Lieu_arrivee', 'Distance_liaison'];
if (array_diff($requiredFields, array_keys($_POST))) {
    $_POST['error'][] = "All fields must be filled.";
    header('location: /marieteam_php/liaison/try_edit/' . $data['id']);
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

    $db->update("UPDATE liaison 
                 SET Lieu_depart = '{$lieuDepart}', 
                     Lieu_arrivee = '{$lieuArrivee}', 
                     Distance_liaison = '{$distanceLiaison}' 
                 WHERE id_Liaison = '{$data['id']}'");
} else {
    $_POST['error'][] = "SQL injection attempt detected.";
    header('location: /marieteam_php/liaison/try_edit/' . $data['id']);
    exit;
}
