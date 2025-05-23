<?php

use App\DB\BDD;

$db = new BDD(); //création de la connexion à la base de données

//Base des requette sql pour la table bateaufret
$queryBase = 'SELECT ' .
        'bateau.id_Bateau, ' .
        'Nom_bateau, ' .
        'Longueur_bateau, ' .
        'Largeur_bateau, ' .
        'Poid_max ' .
    'FROM bateau LEFT JOIN bateaufret ' .
    'ON bateau.id_Bateau = bateaufret.id_Bateau ' .
    'WHERE Type_bateau="Fret"';

function getAllBoatFret(): array
{
    global $db, $queryBase;
    return $db->selectAll($queryBase);
}

function getBoatFretByID(int $id): array
{
    global $db, $queryBase;
    $params = [
        ':id' => $id
    ];
    $query = $queryBase . 'id_Bateau=:id';
    return $db->selectOneParam($query, $params);
}