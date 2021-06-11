<?php


class imgController {
    private PDO $pdo;
    private ImageManager $imageManager;

    public function __construct (PDO $pdo) {
        $this->pdo = $pdo;
        $this->imageManager = new ImageManager($this->pdo);
    }

    /**
     * @return array
     */
    public function displayImage () {
        return $this->imageManager->getAllImages();
    }
}