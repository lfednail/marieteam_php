<?php

use App\DB\BDD;

$db = new BDD();

if(isset($data['id'])){
    require dirname(__DIR__) . "/liaisons/detail.php";
}else{
    require dirname(__DIR__) . "/liaisons/list.php";
}

