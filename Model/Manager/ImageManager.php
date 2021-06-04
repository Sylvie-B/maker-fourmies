<?php


class ImageManager {
    private PDO $pdo;
    private ActionManager $actionManager;

    /**
     * ImageManager constructor.
     * @param $pdo
     */
    public function __construct ($pdo){
        $this->pdo = $pdo;
        $this->actionManager = new ActionManager($this->pdo);
    }

    /**
     * @param string $image
     * @param $action_fk
     * @return string
     */
    public function addImage(string $image, $action_fk){
        $sql = $this->pdo->prepare("INSERT INTO image (image, action_fk) VALUES (':image', ':action_fk')");
        $sql->bindValue(':image', $image);
        $sql->bindValue(':action_fk', $action_fk, PDO::PARAM_INT);
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0 ;
    }

    /**
     * @param $id
     * @return Image
     */
    public function getOneImage($id) : Image {
        $sql = $this->pdo->prepare("SELECT * FROM image WHERE id_img = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $image = new Image();
        if($result){
            $image->setIdImg($result['id_img']);
            $image->setImage($result['image']);
            $action = $this->actionManager->getOneAction($result['action_fk']);
            $image->setAction($action);
        }
        return $image;
    }

    /**
     *
     * @return array
     */
    public function getAllImages () : array {
        $images = [];
        $sql = $this->pdo->prepare("SELECT * FROM image");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $image) {
                $action = $this->actionManager->getOneAction($result['action_fk']);
                $images[] = new Image($image['id_img'], $image['image'], $action);

            }
        }
        return $images;
    }
}