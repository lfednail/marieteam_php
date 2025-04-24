<?php

use App\DB\BDD;
global $db;
$db = new BDD();

function getPeriode(){
    global $db;
    $query = "SELECT * FROM periode";
    return $db->selectAll($query);
}