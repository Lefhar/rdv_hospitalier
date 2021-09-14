<?php

class ajoutpatientrendezvous
{
    public function index()
    {
        include(baseDir . 'models/postpatientrdvModel.php');
        $ajout = new postpatientrdvModel();
        $data = $ajout->post();
        if($data['success']){
            header('Location: index.php?page=listepatients');
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/ajout-patient-rendez-vous.php');
        include(baseDir . 'views/footer.php');
    }
}