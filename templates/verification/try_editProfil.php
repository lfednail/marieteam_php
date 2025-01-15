<?php
require_once 'verify.php';

if(isset($_SESSION['user'])){
    //verification all element form are send
    if(
        isset($_POST['Nom_utilisateur']) &&
        isset($_POST['Prenom_utilisateur']) &&
        isset($_POST['Mail'])
    ){

        //if no modification password
        if(!isset($_POST['Mot_de_passe'])){
            //verification no SQL injection tentative
            if(
                verifieString($_POST['Nom_utilisateur']) &&
                verifieString($_POST['Prenom_utilisateur']) &&
                verifieString($_POST['Mail'])
            ){
                $db->update("UPDATE utilisateur SET Nom_utilisateur, Prenom_utilisateur, Mail VALUES ('{$_POST['Nom_utilisateur']}', '{$_POST['Prenom_utilisateur']}', '{$_POST['Mail']}') WHERE id_Utilisateur = {$_SESSION['id_Utilisateur']} ");
            }else{
                $_POST[] = "SQL injection tentative detected.";
                header('location: /marieteam_php/profile/');
            }
        }else{
            if(isset($_POST['Mot_de_passeConf'])){
                if($_POST['Mot_de_passe'] == $_POST['Mot_de_passeConf']){
                    if(
                        verifieString($_POST['Nom_utilisateur']) &&
                        verifieString($_POST['Prenom_utilisateur']) &&
                        verifieString($_POST['Mail']) &&
                        verifieString($_POST['Mot_de_passe'])
                    ){
                        $errorPwd = verifyPassword($_POST['Mot_de_passe']);
                        if(empty($errorPwd)){
                            $cryptPassword = hash($_POST['Mot_de_passe']);
                            $db->update("UPDATE utilisateur SET Nom_utilisateur, Prenom_utilisateur, Mail, Mot_de_passe VALUES ('{$_POST['Nom_utilisateur']}', '{$_POST['Prenom_utilisateur']}', '{$_POST['Mail']}', '{$cryptPassword}') WHERE id_Utilisateur = {$_SESSION['id_Utilisateur']} ");
                            header('location: /marieteam_php/public/profil/');
                        }else{
                            foreach ($errorPwd as $ePwd)
                                $_POST['error'][] = $ePwd;
                            header('location: /marieteam_php/public/profil/');
                        }
                    }else{
                        $_POST['error'][] = "SQL injection tentative detected.";
                        header('location: /marieteam_php/public/profil/');
                    }
                }else{
                    $_POST['error'][] = "Your password and your confirmation of password do not correspond. ";
                    header('location: /marieteam_php/public/profil/');
                }
            }else{
            }
        }
    }else{
        $_POST['error'][] = "All element of the form (except what pretend to the password) must be fill. ";
        header('location: /marieteam_php/public/profil/');
    }
}else {
    header('location: /marieteam_php/public/profil/');
}