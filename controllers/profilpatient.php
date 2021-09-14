<?php

class profilpatient
{
    public function index()
    {
        include(baseDir . 'models/modifierpatientModel.php');
        $profil = new modifierpatientModel();
        $profil->setId(is_numeric($_GET['id']) ? (int)$_GET['id'] : 0);
        $data = $profil->index();
        if ($data['success']) {

            header('Location: index.php?page=listepatients');
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/profil-patient.php');
        include(baseDir . 'views/footer.php');
    }

}