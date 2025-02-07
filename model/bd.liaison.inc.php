<?php

use App\DB\BDD;

include_once 'model/verification.inc.php';

global $db;
$db = new BDD();

function createLiaison($started, $ended, $distance){
    $error = [];
    global $db;
    if(!verifieString($started) || !verifieString($ended) || !verifieString($distance)){
        $error[] = "SQL injection attempt detected.";
        return $error;
    }else{
        $db->insert("INSERT INTO liaison (Lieu_depart, Lieu_arrivee, Distance_liaison) 
                     VALUES ('{$started}', '{$ended}', '{$distance}')");
    }
    return $error;
}

function editLiaison(){}

function deleteLiaison(){}

function getLiaisonById($id){
    global $db;
    $query = "SELECT * FROM liaison WHERE id_liaison = {$id}";
    return $db->selectOne($query);
}

function getAllLiaison(){
    global $db;
    $query = "SELECT * FROM liaison";
    return $db->select($query);
}