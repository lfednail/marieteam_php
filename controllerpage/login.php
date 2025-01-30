<?php
include_once  __DIR__ . "/../model/auth.inc.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $errors = login($_POST['email'], $_POST['password']);
    if (empty($errors)) {
        header('location: /marieteam_php/profile');
        exit;
    }
}

require "vue/viewLogin.php";