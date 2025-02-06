<?php
use App\DB\BDD;

require_once "verification.inc.php";

global $db;
$db = new BDD();

function login(string $email, string $password): array{
    $errors = [];
    // Check if form is fully filled
    global $db;
    // Sanitize inputs to prevent SQL injection
    if (!verifieString($email) || !verifieString($password)) {
        $errors[] = "SQL injection attempt detected!";
    }

    // Validate password according to CNIl recommendations
    $errorPassword = verifyPassword($password);
    if (!empty($errorPassword)) {
        foreach ($errorPassword as $e) {
            $errors[] = $e;
        }
    }

    // Check if user exists in the database
    $users = $db->selectOne("SELECT * FROM utilisateur WHERE Mail LIKE '${email}'");
    if (is_null($users)) {
        $errors[] = "This email address is incorrect.";
    }

    // Verify password
    if (!password_verify($_POST["password"], $users["Mot_de_passe"])) {
        $errors[] = "This password is incorrect.";
    }

    // Successful login
    if (empty($errors)) {
        $_SESSION['user'] = $users;
    }
    return $errors;
}

function logout(){
    unset($_SESSION['user']);
    header('Location: /marieteam_php');
    exit;
}

function register(string $last_name, string $first_name, string $email, string $password): array
{
    global $db;
    $errors = [];

// Sanitize inputs to prevent SQL injection
    if (!verifieString($_POST['last_name']) || !verifieString($_POST['first_name']) || !verifieString($email) || !verifieString($password)) {
        $errors[] = "SQL injection attempt detected!";
    }

// Validate password according to CNIl recommendations
    $errorPassword = verifyPassword($password);
    if (!empty($errorPassword)) {
        if (is_array($errorPassword)) {
            foreach ($errorPassword as $e) {
                $errors[] = $e;
            }
        } else {
            $errors[] = $errorPassword;
        }
    }

// Check if the email is already used
    $emailExists = $db->selectOne("SELECT * FROM utilisateur WHERE Mail LIKE '$email'");
    if (!empty($emailExists)) {
        $errors[] = "This email address is already used. Try logging in.";
    }

// Hash the password
    if (empty($errors)) {
        $cryptPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert new user into the database

        $db->insert("INSERT INTO utilisateur (`Nom_utilisateur`, `Prenom_utilisateur`, `Mail`, `Mot_de_passe`) 
             VALUES (
                '${last_name}',
                '${first_name}',
                '${email}',
                '$cryptPassword'
            )"
        );

// Set user session
        $_SESSION['user'] = $db->selectOne("SELECT * FROM utilisateur WHERE Mail LIKE '{$email}'");
    }

    return $errors;
}