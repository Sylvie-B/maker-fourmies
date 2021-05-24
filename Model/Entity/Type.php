<?php


class Type {
    private ?int $id_type;
    private string $type;
    private int $action_fk;

    public function __construct(?int $id_type, string $type, int $action_fk){
        $this->id_type = $id_type;
        $this->type = $type;
        $this->action_fk = $action_fk;
    }

    /**
     * @return int|null
     */
    public function getIdType(): ?int
    {
        return $this->id_type;
    }

    /**
     * @param int|null $id_type
     */
    public function setIdType(?int $id_type): void
    {
        $this->id_type = $id_type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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