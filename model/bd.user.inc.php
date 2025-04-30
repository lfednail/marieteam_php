<?php
use App\DB\BDD;

require_once 'verification.inc.php';
global $db;
$db = new BDD();

function getUserByMail(string $email){
    global $db;
    $params = [
        ':mail' => $email
    ];
    $user = $db->selectOneParam("SELECT * FROM utilisateur WHERE Mail LIKE :mail", $params);
    print_r($user);
    return !empty($user) ? $user : [];
}