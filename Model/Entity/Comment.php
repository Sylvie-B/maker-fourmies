<?php


class Comment {
    private ?int $id_com;
    private ?string $content;
    private ?int $pseudo_fk; // author
    private ?int $date;
    private ?int $action_fk;    // about

    public function __construct(?int $id_com = null, ?string $content = null, ?int $pseudo_fk = null, ?int $date = null, ?int $action_fk = null) {
        $this->id_com = $id_com;
        $this->content = $content;
        $this->pseudo_fk = $pseudo_fk;
        $this->date = $date;
        $this->action_fk = $action_fk;
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
     * @return int|null
     */
    public function getPseudoFk(): ?int
    {
        return $this->pseudo_fk;
    }

    /**
     * @param int|null $pseudo_fk
     */
    public function setPseudoFk(?int $pseudo_fk): void
    {
        $this->pseudo_fk = $pseudo_fk;
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
     * @return int|null
     */
    public function getActionFk(): ?int
    {
        return $this->action_fk;
    }

    /**
     * @param int|null $action_fk
     */
    public function setActionFk(?int $action_fk): void
    {
        $this->action_fk = $action_fk;
    }

}