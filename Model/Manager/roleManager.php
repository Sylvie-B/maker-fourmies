<?php


class roleManager {
    private PDO $pdo;

    public function __construct ($pdo){
        $this->pdo = $pdo;
    }

    /**
     * @param string $role
     * @return bool
     */
    public function addRole (string $role) {
        $sql = $this->pdo->prepare("INSERT INTO role (role) VALUES (':role')");
        $sql->bindValue(':role', $role);
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0;
    }

    /**
     * @param $id
     * @return Role
     */
    public function getOneRole ($id) {
        $sql = $this->pdo->prepare("SELECT * FROM role WHERE id_role = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $role = new Role();
        if($result){
            $role->setIdRole($result['id_role']);
            $role->setRole($result['role']);
        }
        return $role;
    }

    public function getAllRoles () : array {
        $roles = [];
        $sql = $this->pdo->prepare("SELECT * FROM role");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $role) {
                $roles[] = new Role($role['id_role'], $role['role']);
            }
        }
        return $roles;
    }
}