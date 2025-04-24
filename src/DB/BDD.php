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
        foreach ($params as $key => $value) {
            // Dynamically bind the parameter based on its type
            if (is_int($value)) {
                // Integer
                $stmt->bindParam($key, $value, PDO::PARAM_INT);
            } elseif (is_bool($value)) {
                // Boolean
                $stmt->bindParam($key, $value, PDO::PARAM_BOOL);
            } elseif (is_null($value)) {
                // NULL
                $stmt->bindParam($key, $value, PDO::PARAM_NULL);
            } else {
                // Default to string (covers strings and other types that can be cast to string)
                $stmt->bindParam($key, $value, PDO::PARAM_STR);
            }
        }
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