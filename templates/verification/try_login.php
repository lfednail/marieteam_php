<?php

require_once "verify.php";

//verify full form complited
if(
    (isset($_POST['last_name'])) &&
    (isset($_POST['first_name'])) &&
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

            //verification user exist
            $users = $db->selectOne('Select * from utitlisateur where Mail like ${_POST["email"]} and pa');
            if(is_null($users)) {
                $_SESSION['user'] = $users;
                header('/');
            }
            else{
                $_POST['error'][] = "This email adresse or password is in correct.";
                header('register');
            }
        }
        else{
            $_POST['error'][] = $errorPassword;
            header('login');
        }
    }else{
        $_POST['error'] []= "SQinjection tentative detected!";
        header('login');
    }

}else{
    $_POST['error'] []= "All form element must be fill";
    header('login');
}