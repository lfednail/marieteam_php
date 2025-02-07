<?php

// Redirect if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: /marieteam_php');
    exit;
}

include_once 'model/bd.profile.inc.php';
require_once 'vue/viewProfile.php';