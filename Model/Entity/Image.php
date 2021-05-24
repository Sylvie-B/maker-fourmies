<?php


class Image {
    private ?int $id_img;
    private string $image;
    private int $action_fk;

    public function __construct(?int $id_img, string $image, int $action_fk){
        $this->id_img = $id_img;
        $this->image = $image;
        $this->action_fk = $action_fk;
    }

    /**
     * @return int|null
     */
    public function getIdImg(): ?int
    {
        return $this->id_img;
    }

    /**
     * @param int|null $id_img
     */
    public function setIdImg(?int $id_img): void
    {
        $this->id_img = $id_img;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getActionFk(): int
    {
        return $this->action_fk;
    }

    /**
     * @param int $action_fk
     */
    public function setActionFk(int $action_fk): void
    {
        $this->action_fk = $action_fk;
    }
}