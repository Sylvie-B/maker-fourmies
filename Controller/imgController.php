<?php


class imgController {
    private PDO $pdo;
    private ImageManager $imageManager;
    private ActionManager $actionManager;

    public function __construct (PDO $pdo) {
        $this->pdo = $pdo;
        $this->imageManager = new ImageManager($this->pdo);
        $this->actionManager = new ActionManager($this->pdo);
    }

    /**
     * @return array
     */
    public function displayImage () {
        return $this->imageManager->getAllImages();
    }

    public function displayAction () {
        return $this->actionManager->getAllActions();
    }
}
