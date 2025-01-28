<?php

use App\DB\BDD;

require_once "verify.php";

$db = new BDD();
$_SESSION['error'] = [];

// Check if form is fully filled
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $_SESSION['error'][] = "All form elements must be filled.";
    header('Location: login');
    exit;
}

// Sanitize inputs to prevent SQL injection
if (!verifieString($_POST['email']) || !verifieString($_POST['password'])) {
    $_SESSION['error'][] = "SQL injection attempt detected!";
    header('Location: login');
    exit;
}

// Validate password according to CNIl recommendations
$errorPassword = verifyPassword($_POST['password']);
if (!empty($errorPassword)) {
    foreach ($errorPassword as $e) {
        $_SESSION['error'][] = $e;
    }
    header('Location: login');
    exit;
}

// Check if user exists in the database
$users = $db->selectOne("SELECT * FROM utilisateur WHERE Mail LIKE '{$_POST['email']}'");
if (is_null($users)) {
    $_SESSION['error'][] = "This email address is incorrect.";
    header('Location: login');
    exit;
}

// Verify password
if (!password_verify($_POST["password"], $users["Mot_de_passe"])) {
    $_SESSION['error'][] = "This password is incorrect.";
    header('Location: login');
    exit;
}

// Successful login
$_SESSION['user'] = $users;
header('Location: /marieteam_php');
exit;

