<?php
include_once __DIR__ . "/../model/auth.inc.php";
$errors = [];

if (
    isset($_POST['last_name']) &&
    isset($_POST['first_name']) &&
    isset($_POST['email']) &&
    isset($_POST['password'])
) {

    $errors = register($_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['password']);
    if (isset($_SESSION['user'])) {
        header('location: /marieteam_php/profile');
        exit;
    }
}
include "vue/viewRegister.php";