<?php

namespace App\DB;
use PDO;
use PDOStatement;

class BDD{
    private $BDD;
    public function __construct(){
        $env = parse_ini_file('.env');
        $this->BDD = new PDO('mysql:host=' . $env['HOSTNAME'] . ';dbname=' . $env['DATABASE'], $env['USER'], $env['PASSWORD']);
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
        $this->bindParam($stmt, $params);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOneParam(string $sql , array $params){
        $stmt = $this->BDD->prepare($sql);
        $this->bindParam($stmt, $params);
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

    private function bindParam(PDOStatement $stmt, array $params){
        //boucle liant les parametres a la requette
        foreach ($params as $key => $value) {
            // Dynamically bind the parameter based on its type
            switch ($value){
                //integer
                case is_int($value): $stmt->bindParam($key, $value, PDO::PARAM_INT);
                break;
                //boolean
                case is_bool($value): $stmt->bindParam($key, $value, PDO::PARAM_BOOL);
                break;
                //null
                case is_null($value): $stmt->bindParam($key, $value, PDO::PARAM_NULL);
                break;
                //default
                default: $stmt->bindParam($key, $value);
                break;
            }
        }
    }
}