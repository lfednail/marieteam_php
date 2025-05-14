<?php
include_once "model/bd.crossing.inc.php";
if(
    isset($_GET['lieu_depart']) &&
    isset($_GET['lieu_arrivee']) &&
    isset($_GET['date_depart'])
){
    $combinSearch = 0;
    if($_GET['lieu_depart'] != "")
        $combinSearch +=1;
    if($_GET['lieu_arrivee'] != "")
        $combinSearch +=2;
    if($_GET['date_depart'] != "")
        $combinSearch +=4;
    switch ($combinSearch){
        case 0:  $crossings = getAllCrossingByDate(date('Y-m-d'));
        break;
        case 1: $crossings = getCrossingByStart($_GET['lieu_depart']);
        break;
        case 2: $crossings = getCrossingByEnd($_GET['lieu_arrivee']);
        break;
        case 3: $crossings = getCrossingByPorts($_GET['lieu_depart'], $_GET['lieu_arrivee']);
        break;
        case 4: $crossings = getAllCrossingByDate($_GET['date_depart']);
        break;
        case 5: $crossings = getCrossingByDateNStart($_GET['date_depart'], $_GET['lieu_depart']);
        break;
        case 6: $crossings = getCrossingByDateNEnd($_GET['date_depart'], $_GET['lieu_arrivee']);
        break;
        case 7: $crossings = getCrossingByDateNPorts($_GET['date_depart'], $_GET['lieu_depart'], $_GET['lieu_arrivee']);
        break;
    }
}
else
    $crossings = getAllCrossingByDate(date('Y-m-d'));
include "vue/viewCrossing.php";