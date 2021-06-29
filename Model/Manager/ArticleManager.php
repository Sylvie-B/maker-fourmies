<?php


class ArticleManager {
    private PDO $pdo;
    private UserManager $userManager;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userManager = new UserManager($this->pdo);
    }


}