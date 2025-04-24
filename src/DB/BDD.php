<?php

namespace App\DB;

use PDO;
class BDD{
    private $BDD;
    public function __construct(){
        $this->BDD = new PDO('mysql:host=localhost;dbname=marieteam_nef_php', 'root', '');
    }

    public function selectAll(string $sql){
        $resp = $this->BDD->query($sql);
        return  $resp ? $resp->fetchAll(PDO::FETCH_ASSOC) : [];
    }

    public function selectOne(string $sql){
        $resp = $this->BDD->query($sql);
        return  $resp ? $resp->fetch(PDO::FETCH_ASSOC) : [];
    }

    public function selectParam(string $sql , array $params){
        $stmt = $this->BDD->prepare($sql);
        //boucle liant les parametres a la requette
        foreach ($params as $key => $value)
            $stmt->bindParam($key, $value);
        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(string $sql): bool
    {
        return $this->BDD->query($sql)->execute();
    }

    public function update(string $sql): bool
    {
        return $this->BDD->query($sql)->execute();
    }
}