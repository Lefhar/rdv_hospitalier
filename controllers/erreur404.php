<?php

class erreur404
{
    public function index()
    {
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/erreur404.php');
        include(baseDir . 'views/footer.php');
    }
}