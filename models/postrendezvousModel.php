<?php

class postrendezvousModel
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
        if (!empty($_POST)) {
            if(empty($_POST['dateHour'])){
                $data['error'] = "Veuillez remplir les champs obligatoire *";
            }else{

                $rdv = $this->db->prepare("INSERT INTO appointments(dateHour, idPatients ) VALUES (?,?)");
                $rdv->execute(array($_POST['dateHour'],$_POST['idPatients']));
                $data['success'] = true;
            }
        }
        return $data;
    }
}