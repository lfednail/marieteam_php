<?php

use App\DB\BDD;

require_once 'verification.inc.php';
global $db;
$db = new BDD();
function editProfile(int $id_Utilisateur, string $last_name, string $first_name, string $email, string $password = null, string $passwordConfirmation = null): array
{
	global $db;
	$errors=[];
    if(
        !verifieString($_POST['Nom_utilisateur']) ||
        !verifieString($_POST['Prenom_utilisateur']) ||
        !verifieString($_POST['Mail'])
    )
        {
        $errors[] = "SQL injection attempt detected.";
    }

    //if password not changed
    if(!isset($password) && !isset($passwordConf)) {
        $password = $_SESSION['user']['Mot_de_passe'];
    }else{//if password changed

        //check if password equals password confirmation
        if($password != $passwordConfirmation){
            $errors[] = "Password and confirmation do not match.";
        }

        //check if password not SQLinjection attempt
        if(verifieString($password)){
            $errors[] = "SQL injection attempt detected.";
        }

        //check if password is valid
        $errorPwd = verifyPassword($password);
        if(!empty($errorPwd)){
            foreach($errorPwd as $ePwd){
                $errors[] = $ePwd;
            }
        }
    }

    if(empty($errors)){
        $cryptPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE utilisateur " .
                        "SET Nom_utilisateur = '$last_name'," .
                            "Prenom_utilisateur = '$first_name', " .
                            "Mail = '{$email}', " .
                            "Mot_de_passe = '{$cryptPassword}'" .
                        "WHERE id_Utilisateur = {$id_Utilisateur}";
        $db->update($updateQuery);

        $_SESSION['user'] = $db->selectOne("SELECT * FROM utilisateur WHERE id_Utilisateur = {$id_Utilisateur}");
    }

	return $errors;
}
