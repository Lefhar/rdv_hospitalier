<?php

class supprimerrendezvous
{
    public function index()
    {
        include(baseDir . 'models/deleterendezvousModel.php');
        $del = new deleterendezvousModel();
        $del->setId(is_numeric($_POST['id']) ? (int)$_POST['id'] : 0);
        $data = $del->delete();
        if ($data['success']) {
            if (!empty($_POST['page'])) {
                $postPage = '&p=' . (int)$_POST['page'];
            } else {
                $postPage = '';
            }

            header('Location: ../listerendezvous' . $postPage);
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/liste-patients.php');
        include(baseDir . 'views/footer.php');
    }

}