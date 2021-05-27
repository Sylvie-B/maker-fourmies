<?php


class TypeManager {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param string $type
     * @return string
     */
    public function addType(string $type){
        $sql = $this->pdo->prepare("INSERT INTO type (type) VALUE (:type)");
        $sql->bindValue(':type', trim(strip_tags($type)));
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0 ;
    }

    /**
     * @param $id
     * @return Type
     */
    public function getOneType ($id){
        $sql = $this->pdo->prepare("SELECT * FROM type WHERE id_type = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $type = new Type();
        if($result){
            $type->setIdType($result['id_type']);
            $type->setType($result['type']);
        }
        return $type;
    }

    public function getAllTypes () {
        $types = [];
        $sql = $this->pdo->prepare("SELECT * FROM type");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $type) {
                $types[] = new Type($type['id_type'], $type['type']);
            }
        }
        return $types;
    }
}
