<?php
include_once  "model/auth.inc.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $errors = login($_POST['email'], $_POST['password']);
    if (empty($errors)) {
        header('location: /marieteam_php/profile');
        exit;
    }else{
        include "vue/viewErrors.php";
    }
}

require "vue/viewLogin.php";