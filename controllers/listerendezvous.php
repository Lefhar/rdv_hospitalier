<?php

class listerendezvous
{
    public function index()
    {
        include(baseDir . 'models/listerendezvousModel.php');
        $patients = new listerendezvousModel();
        if(!empty($_GET['p'])){
            $patients->setPage($_GET['p']);
        }

        $data = $patients->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/liste-rendezvous.php');
        include(baseDir . 'views/footer.php');
    }

}