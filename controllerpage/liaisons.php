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
        $crossingVoyageur = getAllCruiseCrossingByLiaisonId($data['id']);
        $crossingFret = getAllFretCrossingByLiaisonId($data['id']);
        //print_r($crossingVoyageur);
        include "vue/viewLiaisonDetail.php";
    } else {
        if(isset($_POST['Lieu_depart']) && isset($_POST['Lieu_arrivee']) && isset($_POST['Distance_liaison'])){
            $errors = createLiaison($_POST['Lieu_depart'], $_POST['Lieu_arrivee'], $_POST['Distance_liaison']);
            unset($_POST);
            include "vue/viewErrors.php";
        }
        $liaisons = getAllLiaison();
        include "vue/viewLiaisonList.php";
    }