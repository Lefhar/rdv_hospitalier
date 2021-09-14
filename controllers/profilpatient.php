<?php

class profilpatient
{
    private $db; // déclaration de la variable de connexion
    public int $id;

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @param int $page
     */
    public function setId(int $page)
    {
        $this->id = $page;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}