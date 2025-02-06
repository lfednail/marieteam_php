<?php

use App\DB\BDD;

$db = new BDD(); //création de la connexion à la base de données

function getAllFretCrossing()
{
    global $db;
    $query = "SELECT * FROM viewtraversee_fret";
    return $db->select($query);
}

function getAllVoyageurCrossing()
{
    global $db;
    $query = "SELECT * FROM viewtraversee_voyageur";
    return $db->select($query);
}
function getAllFretCrossingByLiaisonId($id)
{
    global $db;
    $query = "SELECT * FROM viewtraversee_fret WHERE id_Liaison = {$id}";
    return $db->select($query);
}

function getAllVoyageurCrossingByLiaisonId($id)
{
    global $db;
    $query = "SELECT * FROM viewtraversee_voyageur WHERE id_Liaison = {$id}";
    return $db->select($query);
}

function getAllCrossingByDate($date)
{
    global $db;
    $query = "SELECT * FROM traversee WHERE Date_depart = '{$date}'";
    return $db->select($query);
}
