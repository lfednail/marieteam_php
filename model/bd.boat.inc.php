<?php

use App\DB\BDD;

global $db, $queryBase;
$db = new BDD(); //création de la connexion à la base de données

$queryBase = 'SELECT * FROM bateau';

function getAllBoat()
{
    global $db, $queryBase;
    return $db->selectAll($queryBase);
}

function getBoatByID(int $id)
{
    global $db, $queryBase;
    $params = [
        ':id' => $id
    ];
    $query = $queryBase . ' WHERE id_Bateau=:id';
    return $db->selectOneParam($query, $params);
}