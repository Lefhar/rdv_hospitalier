<?php

class postpatientrdvModel
{
    private $db; // déclaration de la variable de connexion

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @brief permet l'ajout du patient en même temps du rendez-vous
     * @return array
     */
    public function post():array
    {
        $data = array();
        $data['success'] = false;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_POST) {
            if(empty($_POST['lastname']) or empty($_POST['firstname']) or empty($_POST['birthdate']) or empty($_POST['mail']) or empty($_POST['dateHour'])){
                $data['error'] = "Veuillez remplir les champs obligatoire *";
            }else{

                $stmt = $this->db->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)");
                if($stmt->execute(array($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']))){

                    $data['success'] = true;

                    $rdv = $this->db->prepare("INSERT INTO appointments(dateHour, idPatients ) VALUES (?,?)");
                    $rdv->execute(array($_POST['dateHour'],$this->db->lastInsertId()));
                }
            }
        }
        return $data;
    }
}