<?php

namespace App\DB;

use PDO;
class BDD{
    private $BDD;
    public function __construct(){
        $this->BDD = new PDO('mysql:host=localhost;dbname=marieteam_nef_php', 'root', '');
    }

    public function select(string $sql){
        return $this->BDD->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $sql){
        return $this->BDD->query($sql)->fetchAll();
    }
}