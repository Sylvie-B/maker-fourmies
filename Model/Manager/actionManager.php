<?php


class actionManager {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addAction(string $title, string $description, $date, int $type_fk) {
        $sql = $this->pdo->prepare("
        INSERT INTO action (title, description, date, type_fk)
        VALUE (:title, :description, :date, :type_fk)
        ");
        $sql->bindValue(':title', trim(strip_tags($title)));
        $sql->bindValue(':description', trim(strip_tags($description)));
        $sql->bindValue(':date', $date);
        $sql->bindValue('type_fk', $type_fk, PDO::PARAM_INT);
        $sql->execute();
        return $this->pdo->lastInsertId();
    }
}