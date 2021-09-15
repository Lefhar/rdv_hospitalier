<?php

class searchpatients
{
    public function index()
    {
        include(baseDir . 'models/searchpatientsModel.php');
        $patients = new searchpatientsModel();
        if(!empty($_GET['p'])){
            $patients->setPage($_GET['p']);
        }
        if(!empty($_GET['q'])){
            $patients->setSearch($_GET['q']);
        }

        $data = $patients->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/search-patients.php');
        include(baseDir . 'views/footer.php');
    }
}