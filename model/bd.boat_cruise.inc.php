<?php

use App\DB\BDD;

$db = new BDD(); //création de la connexion à la base de données

$queryBase = `SELECT "` +
                 `bateau.id_Bateau, ` +
                 `Nom_bateau, ` +
                 `Longueur_bateau, ` +
                 `Largeur_bateau, ` +
                 `Vitesse, Places_passager, ` +
                 `Places_vehicules_inf_5, ` +
                 `Places_vehicules_sup_5, ` +
                 `id_Image ` +
             `FROM bateau LEFT JOIN bateauvoyageur ` +
                `ON bateau.id_Bateau = bateauvoyageur.id_Bateau ` +
             `WHERE Type_bateau="Voyageur"`;

function GetAllBoatCruise()
{
    global $db, $queryBase;
    return $db->selectAll($queryBase);
}

function GetBoatCruiseByID(int $id)
{
    global $db, $queryBase;
    $params = [
        ':id' => $id
    ];
    $query = $queryBase . 'id_Bateau=:id';
    return $db->selectParam($query, $params);
}