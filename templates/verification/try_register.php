<?php

use App\DB\BDD;

require_once "verify.php";

$db = new BDD();
$_SESSION['error'] = [];

// Check if form is fully filled
if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['error'][] = "All form elements must be filled.";
    header('Location: register');
    exit;
}

// Sanitize inputs to prevent SQL injection
if (!verifieString($_POST['last_name']) || !verifieString($_POST['first_name']) || !verifieString($_POST['email']) || !verifieString($_POST['password'])) {
    $_SESSION['error'][] = "SQL injection attempt detected!";
    header('Location: register');
    exit;
}

// Validate password according to CNIl recommendations
$errorPassword = verifyPassword($_POST['password']);
if (!empty($errorPassword)) {
    if (is_array($errorPassword)) {
        foreach ($errorPassword as $e) {
            $_SESSION['error'][] = $e;
        }
    } else {
        $_SESSION['error'][] = $errorPassword;
    }
    header('Location: register');
    exit;
}

// Check if the email is already used
$emailExists = $db->selectOne("SELECT * FROM utilisateur WHERE Mail LIKE :email", ['email' => $_POST['email']]);
if ($emailExists) {
    $_SESSION['error'][] = "This email address is already used. Try logging in.";
    header('Location: register');
    exit;
}

// Hash the password
$cryptPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Insert new user into the database
$db->insert("INSERT INTO utilisateur (`Nom_utilisateur`, `Prenom_utilisateur`, `Mail`, `Mot_de_passe`) 
             VALUES (
                '{$_POST['last_name']}',
                '{$_POST['first_name']}',
                '{$_POST['email']}',
                '$cryptPassword'
            )"
);

// Set user session and redirect
$_SESSION['user'] = $db->selectOne("SELECT * FROM utilisateur WHERE Mail LIKE '{$_POST['email']}'");
header('Location: /marieteam_php');
exit;

