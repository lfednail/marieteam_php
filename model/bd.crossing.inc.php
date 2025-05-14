<?php

use App\DB\BDD;

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

function getAllFretCrossingByLiaisonId($id): array
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

function getAllCrossingByDate($date): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "WHERE Date_depart > :date";
    $params = [
        ':date' => $date
    ];
    return $db->selectParam($query, $params);
}

function getCrossingByStart($start): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "WHERE Lieu_depart LIKE CONCAT('%', :depart, '%')";
    $params = [
        ':depart' => $start
    ];
    return $db->selectParam($query, $params);
}

function getCrossingByEnd($end): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "WHERE Lieu_arrivee LIKE CONCAT('%', :arrivee, '%')";
    $params = [
        ':arrivee' => $end
    ];
    return $db->selectParam($query, $params);
}

function getCrossingByPorts($start, $end): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "WHERE Lieu_depart LIKE CONCAT('%', :depart, '%') AND Lieu_arrivee LIKE CONCAT('%', :arrivee, '%')";
    $params = [
        ':depart' => $start,
        ':arrivee' => $end
    ];
    return $db->selectParam($query, $params);
}

function getCrossingByDateNStart($date, $start): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "WHERE Date_depart > :date AND Lieu_depart LIKE CONCAT('%', :depart, '%')";
    $params = [
        ':date' => $date,
        ':depart' => $start
    ];
    return $db->selectParam($query, $params);
}

function getCrossingByDateNEnd($date, $end): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "WHERE Date_depart > :date AND Lieu_arrivee LIKE CONCAT('%', :arrivee, '%')";
    $params = [
        ':date' => $date,
        ':arrivee' => $end
    ];
    return $db->selectParam($query, $params);
}

function getCrossingByDateNPorts($date, $start, $end): array
{
    global $db, $baseQueryCruisse;
    $query = $baseQueryCruisse . "WHERE Date_depart > :date AND Lieu_depart LIKE CONCAT('%', :depart, '%') AND Lieu_arrivee LIKE CONCAT('%', :arrivee, '%')";
    $params = [
        ':date' => $date,
        ':depart' => $start,
        ':arrivee' => $end
    ];
    return $db->selectParam($query, $params);
}