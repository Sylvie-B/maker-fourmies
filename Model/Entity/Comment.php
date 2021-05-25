<?php


class Comment {
    private ?int $id_com;
    private ?string $content;
    private ?string $pseudo; // author
    private ?int $date;
    private ?string $action;    // about

    public function __construct(?int $id_com = null, ?string $content = null, ?string $pseudo = null, ?int $date = null, ?string $action = null) {
        $this->id_com = $id_com;
        $this->content = $content;
        $this->pseudo = $pseudo;
        $this->date = $date;
        $this->action = $action;
    }

    /**
     * @return int|null
     */
    public function getIdCom(): ?int
    {
        return $this->id_com;
    }

    /**
     * @param int|null $id_com
     */
    public function setIdCom(?int $id_com): void
    {
        $this->id_com = $id_com;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * @param string|null $pseudo
     */
    public function setPseudo(?string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return int|null
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @param int|null $date
     */
    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string|null $action
     */
    public function setAction(?string $action): void
    {
        $this->action = $action;
    }


}