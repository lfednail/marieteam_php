<?php
include_once "model/bd.profile.inc.php";
if (!isset($_SESSION['user'])) {
    header('Location: /marieteam_php');
    exit;
}

if (
    isset($_POST['Nom_utilisateur']) &&
    isset($_POST['Prenom_utilisateur']) &&
    isset($_POST['Mail'])
) {
    $errors = editProfile($_SESSION['user']['id_Utilisateur'], $_POST['Nom_utilisateur'], $_POST['Prenom_utilisateur'], $_POST['Mail']);
    if (empty($errors)) {
        header('location: /marieteam_php/profile');
        exit;
    }else{
        include "vue/viewErrors.php";
    }
}
include_once 'vue/viewEditProfile.php';