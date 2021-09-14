<?php

class ajoutpatient
{
    public function index()
    {
        include(baseDir . 'models/postpatientModel.php');
        $ajout = new postpatientModel();
        $data = $ajout->post();
        if($data['success']){
            header('Location: index.php?page=listepatientsModel');
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/ajout-patient.php');
        include(baseDir . 'views/footer.php');
    }
}