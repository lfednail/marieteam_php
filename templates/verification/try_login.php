<?php

use App\DB\BDD;

require_once "verify.php";

$db = new BDD();

$_SESSION['error'] = [];

//verify full form complited
if(
    (isset($_POST['email'])) &&
    (isset($_POST['password']))
){
    //verify for SQLinjection
    if(
        verifieString($_POST['email']) &&
        verifieString($_POST['password'])
    ){
        //verify if password conform to CNIl recommendation
        $errorPassword = verifyPassword($_POST['password']);
        if(empty($errorPassword)){
            //verification user exist
            $users = $db->selectOne("Select * from utilisateur where Mail like '" . $_POST["email"] . "'");
            if(!is_null($users)) {
                if(password_verify($_POST["password"], $users["Mot_de_passe"])){
                    $_SESSION['user'] = $users;
                    header('location: /marieteam_php/public');
                }else{
                    $_SESSION['error'][] = "This password is in correct.";
                    header('location: login');
                }
            }
            else{
                $_SESSION['error'][] = "This email adresse is in correct.";
                header('location: login');
            }
        }
        else{
            foreach ($errorPassword as $e)
                $_SESSION['error'][] = $e;
            header('location: login');
        }
    }else{
        $_SESSION['error'] []= "SQinjection tentative detected!";
        header('location: login');
    }

}else{
    $_POST['error'] []= "All form element must be fill";
    header('login');
}