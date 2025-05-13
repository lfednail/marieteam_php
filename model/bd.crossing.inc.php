<?php

use App\DB\BDD;

include_once "model/bd.boat_cruise.inc.php";
include_once "model/bd.boat_fret.inc.php";

global $db;
$db = new BDD(); //création de la connexion à la base de données

global $baseQueryCruisse;
$baseQueryCruisse = "SELECT " .
        "traversee.id_Traversee, " .
        "traversee.id_Liaison, " .
        "Date_depart, " .
        "Date_arrive, " .
        "Lieu_depart, " .
        "Lieu_arrivee, " .
        "Distance_liaison, " .
        "Nom_bateau, " .
        "Type_Bateau " .
    "FROM traversee " .
    "LEFT JOIN liaison ON traversee.id_Liaison=liaison.id_Liaison " .
    "LEFT JOIN bateau ON traversee.id_Bateau=bateau.id_Bateau ";

global $cruisequery;
$cruisequery = "SELECT " .
        "Places_passager, " .
        "Places_vehicule_inf_5, " .
        "Places_vehicule_sup_5 " .
    "FROM traversee " .
    "LEFT JOIN bateauvoyageur ON traversee.id_Bateau=bateauvoyageur.id_Bateau WHERE id_Traversee=:idTraversee";

global $fretquery;
$fretquery = "SELECT " .
        "Poid_max " .
        "FROM traversee " .
    "LEFT JOIN bateaufret ON traversee.id_Bateau=bateaufret.id_Bateau WHERE id_Traversee=:idTraversee";

function getAllFretCrossing()
{
    global $db, $baseQueryFret;
    $query = $baseQueryFret;
    return $db->selectAll($query);
}

function getAllCruiseCrossing()
{
    global $db, $baseQueryVoyageur;
    $query = $baseQueryVoyageur;
    return $db->selectAll($query);
}

function getAllFretCrossingByLiaisonId($id)
{
    global $db, $fretquery;
    $crossings = getAllCrossingByID($id);
    $fretCrossing = [];
    foreach ($crossings as $crossing){
        if($crossing['Type_Bateau'] == "Fret" ){
            $params = [
                ':idTraversee' => $id
            ];
            $fretCrossing[] = array_merge($crossing, $db->selectOneParam($fretquery, $params));
        }
    }
    return $fretCrossing;
}

function getAllCruiseCrossingByLiaisonId($id): array
{
    global $db, $cruisequery;
    $crossings = getAllCrossingByID($id);
    $cruiseCrossing = [];
    foreach ($crossings as $crossing){
        if($crossing['Type_Bateau'] == "Voyageur" ){
            $params = [
                ':idTraversee' => $id
            ];
            $cruiseCrossing[] = array_merge($crossing, $db->selectOneParam($cruisequery, $params));
        }
    }
    return $cruiseCrossing;
}

function getAllCrossing(): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse;
    return $db->selectAll($query);
}

function getAllCrossingByID($id): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . " WHERE id_Traversee=:idTraversee";
    $params = [
        ':idTraversee' => $id
    ];
    return $db->selectParam($query, $params);
}

function getAllCrossingByDate($date)
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "Date_depart = '{$date}'";
    return $db->selectAll($query);
}