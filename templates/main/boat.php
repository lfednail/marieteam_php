<?php

use App\DB\BDD;

$db = new BDD();

if(isset($data['id'])){
    require dirname(__DIR__) . "/boat/detail.php";
}else{
    require dirname(__DIR__) . "/boat/list.php";
}

