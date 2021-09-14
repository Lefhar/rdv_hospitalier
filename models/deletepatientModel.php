<?php

class deletepatientModel
{
    private $db; // déclaration de la variable de connexion
    public  $id;

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @brief recupération par post à travers le controller de l'id du patient
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @brief retourne l'id du patient
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @brief on supprime les rdv du patient s'il en a ensuite on supprime le patients si le patient n'existe
     * pas on retourne une erreur sans précisé l'absence du patient pour pas dévoiler trop d'information
     * @return array
     */
    public function delete(): array
    {
        $data = array();
        $data['success'] = false;
        $stmt = $this->db->prepare("DELETE FROM `appointments` WHERE idPatients=?");
        $stmt->execute(array($this->id));
        $stmt = $this->db->prepare("DELETE FROM `patients` WHERE id=?");
        if ($stmt->execute(array($this->id))) {
            $data['success'] = true;
        } else {
            $data['erreur'] = "une erreur c'est produite";
        }
        return $data;
    }
}