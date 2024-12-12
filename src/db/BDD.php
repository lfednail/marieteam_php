<?php

namespace App\Database;

class BDD{

    private $BDD;

    public function __construct(){
        $this->BDD = new PDO('mysql:host=localhost;dbname=marieteam_nef_php', 'root', '');
    }

    public function select(string $sql){
        $this->BDD->exec($sql);
    }

    public function insert(string $sql){
        $this->BDD->exec($sql);
    }


}
