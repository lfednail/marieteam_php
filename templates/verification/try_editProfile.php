<?php
require_once 'verify.php';

if (!isset($_SESSION['user'])) {
    header('location: /marieteam_php/');
    exit;
}

$requiredFields = ['Nom_utilisateur', 'Prenom_utilisateur', 'Mail'];
if (!array_diff($requiredFields, array_keys($_POST))) {
    $validData = verifieString($_POST['Nom_utilisateur']) &&
        verifieString($_POST['Prenom_utilisateur']) &&
        verifieString($_POST['Mail']);

    if (!$validData) {
        $_POST['error'][] = "SQL injection tentative detected.";
        header('location: /marieteam_php/profile/editProfile');
        exit;
    }

    $updateQuery = "UPDATE utilisateur SET Nom_utilisateur = '{$_POST['Nom_utilisateur']}', 
                                            Prenom_utilisateur = '{$_POST['Prenom_utilisateur']}', 
                                            Mail = '{$_POST['Mail']}' 
                    WHERE id_Utilisateur = {$_SESSION['id_Utilisateur']}";

    if (!empty($_POST['Mot_de_passe'])) {
        if (isset($_POST['Mot_de_passeConf']) && $_POST['Mot_de_passe'] === $_POST['Mot_de_passeConf']) {
            $validPassword = verifieString($_POST['Mot_de_passe']);
            if ($validPassword) {
                $errorPwd = verifyPassword($_POST['Mot_de_passe']);
                if (empty($errorPwd)) {
                    $cryptPassword = hash($_POST['Mot_de_passe']);
                    $updateQuery = "UPDATE utilisateur SET Nom_utilisateur = '{$_POST['Nom_utilisateur']}', 
                                                        Prenom_utilisateur = '{$_POST['Prenom_utilisateur']}', 
                                                        Mail = '{$_POST['Mail']}', 
                                                        Mot_de_passe = '{$cryptPassword}' 
                                    WHERE id_Utilisateur = {$_SESSION['id_Utilisateur']}";
                } else {
                    foreach ($errorPwd as $ePwd) {
                        $_POST['error'][] = $ePwd;
                    }
                    header('location: /marieteam_php/profile/editProfile');
                    exit;
                }
            } else {
                $_POST['error'][] = "Invalid password.";
                header('location: /marieteam_php/profile/editProfile');
                exit;
            }
        } else {
            $_POST['error'][] = "Password and confirmation do not match.";
            header('location: /marieteam_php/profile/editProfile');
            exit;
        }
    }

    $db->update($updateQuery);
    header('location: /marieteam_php/profile/');
    exit;

} else {
    $_POST['error'][] = "All form fields (except password) must be filled.";
    header('location: /marieteam_php/profile/editProfile');
    exit;
}
