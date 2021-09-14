<?php

class postpatientModel
{
    private $db; // déclaration de la variable de connexion

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function post():array
    {
        $data = array();
        $data['success'] = false;
        if ($_POST) {
            if(empty($_POST['lastname']) or empty($_POST['firstname']) or empty($_POST['birthdate']) or empty($_POST['mail'])){
                $data['error'] = "Veuillez remplir les champs obligatoire *";
            }else{

            $stmt = $this->db->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)");
            $stmt->execute(array($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']));
                $data['success'] = true;
            }
        }
        return $data;
    }
}