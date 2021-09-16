<?php

class listepatientsModel
{
    private $db; // déclaration de la variable de connexion
    public $page;

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setPage(int $page)
    {
        $this->page = $page;
    }

    public function getPage():int
    {
        return (int)$this->page;
    }


    public function index(): array
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = array();
        $patientParPage = 10; //Nous allons afficher 5 messages par page.
        $countpatient = $this->db->prepare('SELECT *   FROM  patients ');
        $countpatient->execute();
        $total =  $countpatient->rowCount();

        //Nous allons maintenant compter le nombre de pages.
        $data['countpage'] = ceil($total / $patientParPage);

        if (!empty($this->getPage())&&$this->getPage()!=0) // Si la variable $_GET['page'] existe...
        {
            $data['pageActuelle'] = intval($this->getPage());

            if ($data['pageActuelle'] > $data['countpage']) // Si la valeur de $data['pageActuelle'] (le numéro de la page) est plus grande que $nombreDePages...
            {
                $data['pageActuelle'] = $data['countpage'];
            }
        } else // Sinon
        {
            $data['pageActuelle'] = 1; // La page actuelle est la n°1
        }
        $debut = ($data['pageActuelle'] - 1) * $patientParPage;
        $listpatients = $this->db->prepare('SELECT * FROM patients ORDER BY `id` DESC LIMIT :debut, :nombre');

        $listpatients->bindParam(':debut', $debut, PDO::PARAM_INT);
        $listpatients->bindParam(':nombre', $patientParPage, PDO::PARAM_INT);
        $listpatients->execute();
        $data['patients'] = $listpatients->fetchAll();
        return $data;
    }
}