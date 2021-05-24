<?php


class Technic {
    private ?int $id_tech;
    private string $technic;

    public function __construct(?int $id_tech, string $technic){
        $this->id_tech = $id_tech;
        $this->technic = $technic;
    }

    /**
     * @return int|null
     */
    public function getIdTech(): ?int
    {
        return $this->id_tech;
    }

    /**
     * @param int|null $id_tech
     */
    public function setIdTech(?int $id_tech): void
    {
        $this->id_tech = $id_tech;
    }

    /**
     * @return string
     */
    public function getTechnic(): string
    {
        return $this->technic;
    }

    /**
     * @param string $technic
     */
    public function setTechnic(string $technic): void
    {
        $this->technic = $technic;
    }
}