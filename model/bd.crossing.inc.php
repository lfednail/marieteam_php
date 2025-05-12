<?php

use App\DB\BDD;

global $db;
$db = new BDD(); //création de la connexion à la base de données

global $baseQueryVoyageur;
$baseQueryVoyageur = "SELECT " .
        "traversee.id_Traversee, " .
        "traversee.id_Liaison, " .
        "Date_depart, " .
        "Date_arrive, " .
        "Lieu_depart, " .
        "Lieu_arrivee, " .
        "Distance_liaison, " .
        "Nom_bateau, " .
        "Places_passager, " .
        "Places_vehicules_inf_5, " .
        "Places_vehicules_sup_5 " .
    "FROM traversee " .
    "LEFT JOIN liaison ON traversee.id_Liaison=liaison.id_Liaison " .
    "LEFT JOIN bateau ON traversee.id_Bateau=bateau.id_Bateau " .
    "LEFT JOIN bateauvoyageur ON bateau.id_Bateau=bateauvoyageur.id_Bateau" .
    " WHERE bateau.Type_bateau='Voyageur'";

global $baseQueryFret;
$baseQueryFret = "SELECT " .
        "traversee.id_Traversee, " .
        "traversee.id_Liaison, " .
        "Date_depart, " .
        "Date_arrive, " .
        "Lieu_depart, " .
        "Lieu_arrivee, " .
        "Distance_liaison, " .
        "Nom_bateau, " .
        "Poid_max " .
    "FROM traversee " .
    "LEFT JOIN liaison ON traversee.id_Liaison=liaison.id_Liaison " .
    "LEFT JOIN bateau ON traversee.id_Bateau=bateau.id_Bateau " .
    "LEFT JOIN bateaufret ON bateau.id_Bateau=bateaufret.id_Bateau" .
    " WHERE bateau.Type_bateau='Fret'";

function getAllFretCrossing()
{
    global $db, $baseQueryFret;
    $query = $baseQueryFret;
    return $db->selectAll($query);
}

function getAllVoyageurCrossing()
{
    global $db, $baseQueryVoyageur;
    $query = $baseQueryVoyageur;
    return $db->selectAll($query);
}

function getAllFretCrossingByLiaisonId($id)
{
    global $db, $baseQueryFret;
    $query = $baseQueryFret . " AND traversee.id_Liaison = {$id}";
    print_r($query);
    return $db->selectAll($query);

function getAllVoyageurCrossingByLiaisonId($id)
{
    global $db, $baseQueryVoyageur;
    $query = $baseQueryVoyageur . " AND traversee.id_Liaison = {$id}";
    print_r($query);
    return $db->selectAll($query);
}
}

function getAllCrossingByDate($date)
{
    global $db;
    $query = "SELECT * FROM traversee WHERE Date_depart = '{$date}'";
    return $db->selectAll($query);
}