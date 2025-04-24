<?php

use App\DB\BDD;
global $db;
$db = new BDD();

$queryBase = `SELECT` .
                `tarifliaison.id_Liaison,` .
                `Libelle_categorie_tarif,` .
                `Libelle_typeTarif,` .
                `Debut_periode,` .
                `Fin_periode,` .
                `Tarif` .
            `FROM tarifliaison` .
            `LEFT JOIN liaison ON liaison.id_Liaison = tarifliaison.id_Liaison` .
            `LEFT JOIN typetarif ON ` .
                `typetarif.Lettre_identification = tarifliaison.Lettre_identification AND ` .
                `typetarif.id_TypeTarif = tarifliaison.id_TypeTarif` .
            `LEFT JOIN categorietarif ON categorietarif.Lettre_identification = tarifliaison.Lettre_identification` .
            `LEFT JOIN periode ON periode.id_Periode = tarifliaison.id_Periode`;

function getTarifLiaison($id){
    global $db, $queryBase;
    $params = [
        ':idLiaison' => $id
    ];
    $query = $queryBase . " AND id_liaison = :idLiaison";
    return $db->selectAll($query);
}