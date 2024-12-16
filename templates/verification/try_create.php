<?php
if(
    (isset($_POST["Lieu_depart"])) &&
    (isset($_POST["Lieu_arrivee"])) &&
    (isset($_POST["Distance_liaison"]))
){
    if(
        verifieString($_POST['Lieu_depart']) &&
        verifieString($_POST['Lieu_arrivee']) &&
        verifieString($_POST['Distance_liaison'])
    ){
        $db->insert("INSERT INTO liaison (Lieu_depart, Lieu_arrivee, Distance_liaison) VALUES ('{$_POST['Lieu_depart']}', '{$_POST['Lieu_depart']}', '{$_POST['Distance_liaison']}') ");
    }else{
        $_POST['error'][] = "SQLinjection tentative detected";
        header('location: create');
    }
}else{
    $_POST["error"][] = "All fields must be filled";
    header('location: create');
}