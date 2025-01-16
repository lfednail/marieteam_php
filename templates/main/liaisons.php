<?php
use App\DB\BDD;
if(isset($_SESSION['user'])){
    if(($_SESSION['users']['Role'] = "admin") || ($_SESSION['users']['Role'] = "Admin")) {

        $db = new BDD();

        if (isset($data['id'])) {
            require dirname(__DIR__) . "/liaisons/detail.php";
        } else {
            require dirname(__DIR__) . "/liaisons/list.php";
        }

    }
}