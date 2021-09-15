<?php

class changerdvModel
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
        $patients = $this->db->prepare('SELECT patients.id idpatient, appointments.id as idapp, patients.lastname,patients.firstname, patients.birthdate,patients.phone, patients.mail, appointments.dateHour FROM appointments join patients on idPatients=patients.id  where appointments.id=?');

        $patients->execute(array($this->getId()));
        $data['rdv'] = $patients->fetch();

        if ($_POST) {
            if (empty($_POST['dateHour'])) {
                $data['error'] = "Veuillez remplir les champs obligatoire *";
            } else {

                $stmt = $this->db->prepare("update appointments set dateHour=? where id=?");
                $stmt->execute(array($_POST['dateHour'], $this->getId()));
                $data['success'] = true;
            }
        }
        return $data;
    }
}