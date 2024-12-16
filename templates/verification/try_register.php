<?php

use App\DB\BDD;

require_once "verify.php";

$db = new BDD();

$_SESSION['error'] = [];


//verify full form complited
if(
    (!empty($_POST['last_name'])) &&
    (!empty($_POST['first_name'])) &&
    (!empty($_POST['email'])) &&
    (!empty($_POST['password']))
){
    //verify for SQLinjection
    if(
        verifieString($_POST['last_name']) &&
        verifieString($_POST['first_name']) &&
        verifieString($_POST['email']) &&
        verifieString($_POST['password'])
    ){
        //verify if password conform to CNIl recommendation
        $errorPassword = verifyPassword($_POST['password']);
        if(empty($errorPassword)){

            //verify if the email adresse is not already used
            if(is_null($db->selectOne('Select * from utitlisateur where Mail like ${_POST["email"]}'))){
                $cryptPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $db->insert("INSERT INTO utilisateur (`Nom_utilisateur`, `Prenom_utilisateur`, `Mail`, `Mot_de_passe`) VALUES (${_POST['last_name']}, ${_POST['first_name']}, ${_POST['email']}, '$cryptPassword)'");
                $_SESSION['user'] = $db->selectOne("SELECT * FROM utilisateur WHERE Mail like ${_POST['email']}");
                header('location: /');
            }
            else{
                $_SESSION['error'][] = "This email adresse is already used try login.";
                header('location: register');
            }
        }
        else{
            if(is_array($errorPassword)) {
                foreach ($errorPassword as $e)
                    $_SESSION['error'] [] = $e;
            }
            else
                $_SESSION['error'][] = $errorPassword;
            header('location: register');
        }
    }else{
        $_SESSION['error'] []= "SQinjection tentative detected!";
        header('location: register');
    }

}else{
    $_SESSION['error'] []= "All form element must be fill";
    header('location: register');
}