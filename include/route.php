<?php
Class route{
    public function index(){
//        if(!empty($_GET['page'])&&$_GET['page']=='patients') {
//            include(baseDir . 'controllers/patients.php');
//        }elseif(!empty($_GET['page'])&&!file_exists(baseDir.'controllers/'.$_GET['page'])) {
//            include(baseDir . 'controllers/erreur404.php');
//        }elseif(!empty($_GET['page'])&&$_GET['page']=='rdv') {
//            include(baseDir.'controllers/rdv.php');
//        }else{
//              include(baseDir.'controllers/home.php');
//                $patients = new home();
//                $index = $patients->index();
//
//        }
        include(baseDir . 'include/database.php');
        if(!empty($_GET['page'])&&!file_exists(baseDir.'controllers/'.$_GET['page'].'.php')) {
            include(baseDir . 'controllers/erreur404.php');
            $erreur404 = new erreur404();
            $erreur404->index();

        }elseif (!empty($_GET['page'])&&file_exists(baseDir.'controllers/'.$_GET['page'].'.php')) {
            include(baseDir.'controllers/'.$_GET['page'].'.php');
            $controller = new $_GET['page']();
            $controller->index();
        }else{
            include(baseDir.'controllers/listepatients.php');
            $patients = new listepatients();
           $patients->index();

        }
    }
}