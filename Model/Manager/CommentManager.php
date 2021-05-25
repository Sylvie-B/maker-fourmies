<?php


class CommentManager {
    private PDO $pdo;
    private UserManager $userManager;
    private ActionManager $actionManager;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userManager = new UserManager($this->pdo);
        $this->actionManager = new ActionManager($this->pdo);
    }

    /**
     * @param string $content
     * @param int $pseudo_fk
     * @param $date
     * @param int $action_fk
     */
    public function addComment (string $content, int $pseudo_fk, $date, int $action_fk){
        $sql = $this->pdo->prepare("
        INSERT INTO comment (content, pseudo_fk, date, action_fk) VALUES (:content, :pseudo_fk, :date, :action_fk)
        ");
        $sql->bindValue(':content', trim(strip_tags($content)));
        $sql->bindValue(':pseudo_fk', $pseudo_fk, PDO::PARAM_INT);
        $sql->bindValue(':date', $date);
        $sql->bindValue(':action_fk', $action_fk, PDO::PARAM_INT);
        $sql->execute();
        return $this->pdo->lastInsertId();
    }

    public function getOneComment ($id){
        $sql = $this->pdo->prepare("SELECT * FROM comment WHERE id_com = $id");
        $sql->execute();
        $result = $sql->fetch();
        $comment = new Comment();
        if($result){
            $comment->setIdCom($result['id_com']);
            $comment->setContent($result['content']);
            $pseudo = $this->userManager->getOneUser($result['pseudo_fk']);
            $comment->setPseudo($pseudo);
            $comment->setDate($result['date']);
            $action = $this->actionManager->getOneAction($result['action_fk']);
            $comment->setAction($action);
        }
        return $comment;
    }

    /**
     * @return array
     */
    public function getAllComment () {
        $comments = [];
        $sql = $this->pdo->prepare("SELECT * FROM comment");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $comment){
                $pseudo = $this->userManager->getOneUser($comment['pseudo_fk']);
                $action = $this->actionManager->getOneAction($comment['action_fk']);
                $comments[] = new Comment($comment['id_com'], $comment['content'], $pseudo, $comment['date'], $action);
            }
        }
        return $comments;
    }

    /**
     * @param $id
     * @return array
     */
    public function getParamComment ($u, $a) {
        $comments = [];
        if(isset($u) && !isset($a)){
            $sql = $this->pdo->prepare("SELECT * FROM comment WHERE pseudo_fk = $u");
            $sql->execute();
            $result = $sql->fetchAll();
            if($result){
                foreach ($result as $comment){
                    $action = $this->actionManager->getOneAction($comment['action_fk']);
                    $comments[] = new Comment($comment['id_com'], $comment['content'], null, $comment['date'], $action);
                }
            }
            return $comments;
        }


    }

}