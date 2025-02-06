<?php

use App\DB\BDD;
global $db;
$db = new BDD();

function getTarifLiaison($id){
    global $db;
    $query = "SELECT * FROM viewtarif_liaison WHERE id_liaison = $id";
    return $db->select($query);
}