<?php


class MatterManager {
    private PDO $pdo;

    public function __construct ($pdo){
        $this->pdo = $pdo;
    }


}