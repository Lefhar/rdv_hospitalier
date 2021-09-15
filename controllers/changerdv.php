<?php

class changerdv
{
    public function index()
    {
        include(baseDir . 'models/changerdvModel.php');
        $profil = new changerdvModel();
        $profil->setId(is_numeric($_GET['id']) ? (int)$_GET['id'] : 0);
        $data = $profil->index();
        if ($data['success']) {

            header('Location: index.php?page=listerendezvous');
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/rendezvous.php');
        include(baseDir . 'views/footer.php');
    }
}