<?php

use App\DB\BDD;

    include_once 'model/bd.liaison.inc.php';
    include_once 'model/bd.crossing.inc.php';
    include_once 'model/bd.tarif.inc.php';
    include_once 'model/bd.periode.inc.php';
    $db = new BDD();
    if (isset($data['id'])) {
        $periodes = getPeriode();
        $tarif = getTarifLiaison($data['id']);
        $crossingVoyageur = getAllVoyageurCrossingByLiaisonId($data['id']);
        $crossingFret = getAllFretCrossingByLiaisonId($data['id']);
        include "vue/viewLiaisonDetail.php";
    } else {
        $liaisons = getAllLiaison();
        include "vue/viewLiaisonList.php";
    }