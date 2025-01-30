<?php
use App\DB\BDD;
if(isset($_SESSION['user'])){
    if(($_SESSION['users']['Role'] = "admin") || ($_SESSION['users']['Role'] = "Admin")) {

        $db = new BDD();

        if (isset($data['id'])) {
            require dirname(__DIR__) . "vue/viewLiaisonDetail.php";
        } else {
            require dirname(__DIR__) . "vue/viewLiaisonList.php";
        }

    }
}