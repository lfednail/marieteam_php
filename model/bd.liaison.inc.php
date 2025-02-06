<?php

use App\DB\BDD;
global $db;
$db = new BDD();

function createLiaison(){}

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