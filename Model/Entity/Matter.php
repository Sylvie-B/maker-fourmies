<?php


class Matter {
    private ?int $id_matter;
    private string $matter;
    private int $origin_fk;

    public function __construct(?int $id_matter, string $matter, int $origin_fk){
        $this->id_matter = $id_matter;
        $this->matter = $matter;
        $this->origin_fk = $origin_fk;
    }

    /**
     * @return int|null
     */
    public function getIdMatter(): ?int
    {
        return $this->id_matter;
    }

    /**
     * @param int|null $id_matter
     */
    public function setIdMatter(?int $id_matter): void
    {
        $this->id_matter = $id_matter;
    }

    /**
     * @return string
     */
    public function getMatter(): string
    {
        return $this->matter;
    }

    /**
     * @param string $matter
     */
    public function setMatter(string $matter): void
    {
        $this->matter = $matter;
    }

    /**
     * @return int
     */
    public function getOriginFk(): int
    {
        return $this->origin_fk;
    }

    /**
     * @param int $origin_fk
     */
    public function setOriginFk(int $origin_fk): void
    {
        $this->origin_fk = $origin_fk;
    }
}