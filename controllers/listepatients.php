<?php

class listepatients
{
    public function index()
    {
        include(baseDir . 'models/listepatientsModel.php');
        $patients = new listepatientsModel();
        if(!empty($_GET['p'])){
            $patients->setPage($_GET['p']);
        }

        $data = $patients->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/liste-patients.php');
        include(baseDir . 'views/footer.php');
    }
}