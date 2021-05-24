<?php


class User {
    private ?int $id_user;
    private PDO $db;
    private ?string $name;
    private ?string $surname;
    private string $pseudo;
    private ?string $mail;
    private string $password;
    private ?int $role_fk;

    public function __construct(?int $id_user, $db, ?string $name, ?string $surname, ?string $mail,string $pseudo,
                                string $password, ?int $date, ?int $role_fk = 4){
        $this->id_user = $id_user;
        $this->db = $db;
        $this->name = $name;
        $this->surname = $surname;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->password = $password;
        $this->role_fk = $role_fk;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    /**
     * @param int|null $id_user
     */
    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }

    /**
     * @param PDO $db
     */
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int|null
     */
    public function getRoleFk(): ?int
    {
        return $this->role_fk;
    }

    /**
     * @param int|null $role_fk
     */
    public function setRoleFk(?int $role_fk): void
    {
        $this->role_fk = $role_fk;
    }

}