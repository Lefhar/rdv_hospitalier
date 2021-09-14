<?php

class modifierpatientModel
{
    private $db; // déclaration de la variable de connexion
    public $id;

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @brief recupération du profil de l'utilisateur
     * @return array
     */
    public function index(): array
    {
        $data = array();
        $data['success'] = false;
        $patients = $this->db->prepare('SELECT * FROM patients where id=?');

        $patients->execute(array($this->getId()));
        $data['profil'] = $patients->fetch();

        if ($_POST) {
            if (empty($_POST['lastname']) or empty($_POST['firstname']) or empty($_POST['birthdate']) or empty($_POST['mail'])) {
                $data['error'] = "Veuillez remplir les champs obligatoire *";
            } else {

                $stmt = $this->db->prepare("update patients set lastname =?, firstname =?, birthdate =?, phone=?, mail=? where id=?");
                $stmt->execute(array($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail'], $this->getId()));
                $data['success'] = true;
            }
        }
        return $data;
    }

}