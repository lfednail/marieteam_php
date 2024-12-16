<?php

namespace App\DB;

use PDO;
class BDD{
    private $BDD;
    public function __construct(){
        $this->BDD = new PDO('mysql:host=localhost;dbname=marieteam_nef_php', 'root', '');
    }

    public function select(string $sql){
        $resp = $this->BDD->query($sql);
        return  $resp ? $resp->fetchAll(PDO::FETCH_ASSOC) : null ;
    }

    public function selectOne(string $sql){
        $resp = $this->BDD->query($sql);
        return  $resp ? $resp->fetch(PDO::FETCH_ASSOC) : null ;
    }

    public function insert(string $sql){
        return $this->BDD->query($sql)->execute();
    }

    public function update(string $sql){
        return $this->BDD->query($sql)->execute();
    }
}