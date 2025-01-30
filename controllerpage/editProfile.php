<?php
include_once "model/bd.profile.inc.php";
$errors = editProfile();
if (!empty($errors)) {
    require_once 'vue/viewProfile.php';
}
else {
	require_once 'vue/viewEditProfile.php';
}