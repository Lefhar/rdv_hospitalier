<?php

class supprimerpatient
{
    public function index()
    {
        include(baseDir . 'models/deletepatientModel.php');
        $del = new deletepatientModel();
        $del->setId(is_numeric($_POST['id']) ? (int)$_POST['id'] : 0);
        $data = $del->delete();
        if ($data['success']) {
            $getPage ='';
            if(!empty($_POST['page'])){
                $getPage = '&p='.$_POST['page'];
            }
            header('Location: index.php?page=listepatients'.$getPage);
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/liste-patients.php');
        include(baseDir . 'views/footer.php');
    }
}