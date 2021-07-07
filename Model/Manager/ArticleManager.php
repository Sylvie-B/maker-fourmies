<?php


class ArticleManager {
    private PDO $pdo;
    private UserManager $userManager;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userManager = new UserManager($this->pdo);
    }

    public function addArticle(string $title_art, string $article, int $user_fk, $date){
        $sql = $this->pdo->prepare("
            INSERT INTO article (title_art, article, user_fk, date)
            VALUES (:title_art, :article, :user_fk, :date)
            ");
        $sql->bindValue(':title_art', $title_art);
        $sql->bindValue(':article', $article);
        $sql->bindValue(':user_fk', $user_fk);
        $sql->bindValue(':date', $date);
        $sql->execute();
        return $this->pdo->lastInsertId() !==0 ;
    }

}