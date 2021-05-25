<?php


class ActionManager {
    private PDO $pdo;
    private TypeManager $typeManager;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->typeManager = new TypeManager();
    }

    /**
     * @param string $title
     * @param string $description
     * @param $date
     * @param int $type_fk
     * @return string
     */
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

    /**
     * @param $id
     * @return Action
     */
    public function getOneAction($id) : Action {
        $sql = $this->pdo->prepare("SELECT * FROM action WHERE id_act = $id");
        $sql->execute();
        $result = $sql->fetch();
        $action = new Action();
        if($result){
            $action->setIdAct($result['id_act']);
            $action->setTitle($result['title']);
            $action->setDescription($result['description']);
            $action->setDate($result['date']);
            $action->setTypeFk($result['type_fk']);
        }
        return $action;
    }

    /**
     * @return array
     */
    public function getAllAction() : array {
        $actions = [];
        $sql = $this->pdo->prepare("SELECT * FROM action");
        $sql->execute();
        $result = $sql->fetchAll();

        if($result){
            foreach ($result as $action) {
                $type = $this->typeManager->getType($action['type_fk']);
                $actions[] = new Action($action['id_act'], $action['title'], $action['description'], $action['date'], $type);
            }
        }
        return $actions;
    }
}
