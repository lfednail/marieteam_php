<?php

require_once "verify.php";

//verify full form complited
if(
    (isset($_POST['email'])) &&
    (isset($_POST['password']))
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
            $cryptPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
            //verification user exist
            $users = $db->selectOne("Select * from utitlisateur where Mail like ${_POST["email"]} and Mot_de_passe like '{$cryptPassword}');");
            if(!is_null($users)) {
                $_SESSION['user'] = $users;
                header('location: /');
            }
            else{
                $_POST['error'][] = "This email adresse or password is in correct.";
                header('location: register');
            }
        }
        else{
            foreach ($errorPassword as $e)
                $_POST['error'][] = $e;
            header('location: login');
        }
    }else{
        $_POST['error'] []= "SQinjection tentative detected!";
        header('location: login');
    }

}else{
    $_POST['error'] []= "All form element must be fill";
    header('login');
}