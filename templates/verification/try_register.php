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

            //verify if the email adresse is not already used
            if(is_null($db->selectOne('Select * from utitlisateur where Mail like ${_POST["email"]}'))){
                $cryptPassword = hash($_POST['password']);
                $db->insert("INSERT INTO utilisateur (`Nom_utilisateur`, `Prenom_utilisateur`, `Mail`, `Mot_de_passe`) VALUES (${_POST['last_name']}, ${_POST['first_name']}, ${_POST['email']}, $cryptPassword)");
                $_SESSION['user'] = $db->selectOne("SELECT * FROM utilisateur WHERE Mail like ${_POST['email']}");
                header('location: /');
            }
            else{
                $_POST['error'][] = "This email adresse is already used try login.";
                header('location: register');
            }
        }
        else{
					if(is_array($errorPassword)) {
						foreach ($errorPassword as $e)
							$_POST['error'] [] = $e;
					}
					else
						$_POST['error'][] = $errorPassword;
            header('location: register');
        }
    }else{
        $_POST['error'] []= "SQinjection tentative detected!";
        header('location: register');
    }

}else{
    $_POST['error'] []= "All form element must be fill";
}