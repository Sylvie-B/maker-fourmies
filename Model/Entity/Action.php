<?php


class Action {
    private ?int $id_act;
    private string $title;
    private string $description;
    // starting date
    private string $date;
    private int $type_fk;

    public function __construct(?int $id_act, string $title, string $description, string $date, int $type_fk){
        $this->id_act = $id_act;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->type_fk = $type_fk;
    }

    /**
     * @return int|null
     */
    public function getIdAct(): ?int
    {
        return $this->id_act;
    }

    /**
     * @param int|null $id_act
     */
    public function setIdAct(?int $id_act): void
    {
        $this->id_act = $id_act;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getTypeFk(): int
    {
        return $this->type_fk;
    }

    /**
     * @param int $type_fk
     */
    public function setTypeFk(int $type_fk): void
    {
        $this->type_fk = $type_fk;
    }

}