<?php

class ajoutrendezvous
{
    public function index()
    {
        include(baseDir . 'models/postrendezvousModel.php');
        $ajout = new postrendezvousModel();
        $data = $ajout->post();
        if($data['success']){
            header('Location: index.php?page=listepatients');
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/ajout-rendezvous.php');
        include(baseDir . 'views/footer.php');
    }
}