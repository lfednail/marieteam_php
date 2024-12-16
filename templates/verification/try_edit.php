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
        $db->update(" UPDATE liaison SET Lieu_depart = '{$_POST['Lieu_depart']}', Lieu_arrivee = '{$_POST['Lieu_depart']}', Distance_liaison = {$_POST['Distance_liaison']} WHERE id_Liaison = '{$data['id']}' ");
    }else{
        $_POST['error'][] = "SQLinjection tentative detected";
        header('location: /marieteam_php/public/liaison/try_edit/'.$data['id']);
    }
}else{
    $_POST["error"][] = "All fields must be filled";
    header('location: /marieteam_php/public/liaison/try_edit/'.$data['id']);
}