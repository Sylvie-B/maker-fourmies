<?php


class MatterManager {
    private PDO $pdo;
    private OriginManager $originManager;

    public function __construct ($pdo){
        $this->pdo = $pdo;
        $this->originManager = new OriginManager($this->pdo);
    }

    /**
     * @param string $matter
     * @param int $origin_fk
     * @return bool
     */
    public function addMatter (string $matter, int $origin_fk){
        $sql = $this->pdo->prepare("INSERT INTO matter (matter, origin_fk) VALUES (':matter', ':origin-fk')");
        $sql->bindValue(':matter', $matter);
        $sql->bindValue(':origin_fk', $origin_fk, PDO::PARAM_INT);
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0;
    }

    public function getOneMatter ($id) {
        $sql = $this->pdo->prepare("SELECT * FROM matter WHERE id_matter = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $matter = new Matter();
        if($result){
            $matter->setIdMatter($result['id_matter']);
            $matter->setMatter($result['matter']);
            $origin = $this->originManager->getOneOrigin($result['id_org']);
            $matter->setOrigin($origin);
        }
        return $matter;
    }

    public function getAllMatters () : array {
        $matter = [];
        $sql = $this->pdo->prepare("SELECT * FROM matter");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $matter){
                $matter[] = new Matter($matter['id_matter'], $matter['matter']);
            }
        }
        return $matter;
    }
}
